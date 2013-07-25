<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="pl" />
        <meta name="author" content="Łukasz Gruszka" />
        {* we can add diferent and special css for every single view*}
        {if isset($cssFiles) and is_array($cssFiles)}
            {foreach from=$cssFiles item=cssFile}
                <link rel="stylesheet" href="{$cssFile.href}" type="{$cssFile.type}" {if isset($cssFile.media) and $cssFile.media}media="{$cssFile.media}"{/if} />
            {/foreach}
        {/if}
        {* we can add diferent and special js for every single view*}
        {if isset($jsFiles) and is_array($jsFiles)}
            {foreach from=$jsFiles item=jsFile}
                <script type="text/javascript" src="{$jsFile}"></script>
            {/foreach}
        {/if}
    </head>
    <body>
        {$body_content}
        {* we can add diferent and special postload js for every single view*}
        {if isset($jsPostloadFiles) and is_array($jsPostloadFiles)}
            {foreach from=$jsPostloadFiles item=jsPostloadFile}
                <script type="text/javascript" src="{$jsPostloadFile}"></script>
            {/foreach}
        {/if}
    </body>
</html>