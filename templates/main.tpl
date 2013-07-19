<h2>Users</h2>
{if isset($users) and is_array($users)}
    <div class="users">
        {foreach from=$users item=user}
            {include file="user/userBox.tpl" user=$user}
        {/foreach}
    </div>
{else}
    <p>No available users.</p>
{/if}