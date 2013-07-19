<h2><a href="/">Users</a> &raquo; User</h2>
{include file="user/userBox.tpl" user=$user}
<h2>Friends</h2>
{if isset($friends) and is_array($friends)}
    <div class="users">
        {foreach from=$friends item=friend}
            {include file="user/userBox.tpl" user=$friend}
        {/foreach}
    </div>
{else}
    <p>No available friends.</p>
{/if}
<h2>Friends 2-nd</h2>
{if isset($friends2nd) and is_array($friends2nd)}
    <div class="users">
        {foreach from=$friends2nd item=friend}
            {include file="user/userBox.tpl" user=$friend}
        {/foreach}
    </div>
{else}
    <p>No available friends.</p>
{/if}
<h2>Friends 2-nd with 2 connections</h2>
{if isset($friends2nd2) and is_array($friends2nd2)}
    <div class="users">
        {foreach from=$friends2nd2 item=friend}
            {include file="user/userBox.tpl" user=$friend}
        {/foreach}
    </div>
{else}
    <p>No available friends.</p>
{/if}