<?php


class MetadataFormatFilter
{

    public static function dateFormat($date)
    {
        return date("n/j/Y", strtotime($date));
    }

    public static function linkFormat($link)
    {
        return<<<END
<a href="$link">$link</a>
END;
    }
}
?>
