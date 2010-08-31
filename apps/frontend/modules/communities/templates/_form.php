<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('communities/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?community_id='.$form->getObject()->getCommunityId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('communities/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'communities/delete?community_id='.$form->getObject()->getCommunityId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['short_description']->renderLabel() ?></th>
        <td>
          <?php echo $form['short_description']->renderError() ?>
          <?php echo $form['short_description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['introductory_text']->renderLabel() ?></th>
        <td>
          <?php echo $form['introductory_text']->renderError() ?>
          <?php echo $form['introductory_text'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['logo_bitstream_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['logo_bitstream_id']->renderError() ?>
          <?php echo $form['logo_bitstream_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['copyright_text']->renderLabel() ?></th>
        <td>
          <?php echo $form['copyright_text']->renderError() ?>
          <?php echo $form['copyright_text'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['side_bar_text']->renderLabel() ?></th>
        <td>
          <?php echo $form['side_bar_text']->renderError() ?>
          <?php echo $form['side_bar_text'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['admin']->renderLabel() ?></th>
        <td>
          <?php echo $form['admin']->renderError() ?>
          <?php echo $form['admin'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
