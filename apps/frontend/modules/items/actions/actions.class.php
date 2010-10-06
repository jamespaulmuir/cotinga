<?php

/**
 * items actions.
 *
 * @package    dspace
 * @subpackage items
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemsActions extends sfActions
{

    public function executeIndex(sfWebRequest $request)
    {
        require_once(sfConfig::get('sf_root_dir').'/plugins/sfElasticSearchPlugin/lib/vendor/ElasticSearchClient/ElasticSearchClient.php');
        
        $this->items = Doctrine::getTable('Item')
                        ->createQuery('a')
                        ->limit(20)
                        ->execute();
    }

    public function executeShow(sfWebRequest $request)
    {
        


        $this->show_full_record = $request->getParameter('full');
        $id = $request->getParameter('item_id');

        $this->item = Doctrine::getTable('Item')->getWithMetadata($id);
        
        $this->forward404Unless($this->item && $this->item->getSlug() == $request->getParameter('slug'));

        $this->bundles = Doctrine::getTable('Bundle')
                ->createQuery('b')
                ->leftJoin('b.Bitstreams bi')
                ->leftJoin('bi.Format bf')
                ->leftJoin('b.Items i')
                ->where('i.item_id = ? AND bf.internal = false', $id)
                ->execute();
        
        $response = $this->getResponse();
        $response->setTitle($this->item->metadata['dc.title'][0]);

        
    }


    public function executeSolr()
    {
        $id = $request->getParameter('item_id');
        $this->item = Doctrine::getTable('Item')->find($id);

        $this->forward404Unless($this->item);

    }

    public function executeBrowse(sfWebRequest $request)
    {
        $this->getResponse()->setTitle('Browse');
         $this->debug = false;
          $this->setLayout('plainlayout');


    }

    public function executeSearch(sfWebRequest $request)
    {

        $term = strtolower($request->getParameter('q'));

        $this->q = $term;
        
        $transport = new ElasticSearchTransportHTTP('localhost', 9200);
        $search = new ElasticSearchClient($transport, "cotinga", "item");

        $dsl = array(
            'facets' => array(
                'subjects' => array(
                    'terms' => array(
                        'field' => 'dc.subject.untouched',
                        'size' => 10,
                    )
                ),
                'types' => array(
                    'terms'=> array(
                        'field'=> 'dc.type',
                        'size'=> 5
                    )
                ),
                'language'=>array(
                    'terms'=>array(
                        'field'=>'dc.language.iso.untouched',
                        'size'=>10
                    )
                ),
                'creator'=>array(
                    'terms'=>array(
                        'field'=>'dc.creator.untouched',
                        'size'=>10
                    )
                )
            ),

            'size' => 50,
        );
        $filterSubject = $request->getParameter('filters');


        if ($filterSubject) {
            $dsl['query'] = array(
                'filtered' => array(
                    'query' => array(
                        'dis_max' => array(
                            'queries' => array(
                                0 => array(
                                    'term' => array('dc.title' => $term)
                                ),
                                1 => array('prefix' => array('dc.title' => $term)),
                                2 => array('prefix' => array('dc.subject' => $term))
                            )
                        )
                    )
                ),
            );
            $values = array();

            foreach($filterSubject as $subject){
                foreach($subject as $field=>$value){
                    $values[] = $value;
                }

            }
            $dsl['query']['filtered']['filter'] = array(
                'query'=>array(
                    'field'=>array(
                        'dc.subject'=>  implode(' AND ', $values)
                    )
                )

            );

        } else {
            $dsl['query'] = array(

                        'dis_max' => array(
                            'queries' => array(
                                0 => array(
                                    'term' => array('dc.title' => $term)
                                ),
                                1 => array('prefix' => array('dc.title' => $term)),
                                2 => array('prefix' => array('dc.subject' => $term)),
                                3 => array('term' => array('dc.description.abstract'=>$term))
                            )
                        )

            );

        }

        $this->dsl = $dsl;
        $results = $search->search($dsl);
        $this->results = $results;
    }

}
