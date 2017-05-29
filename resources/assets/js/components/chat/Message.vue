<template lang="html">
    <div class="uk-padding-small">
        <article class="uk-comment"
                 :class="{ 'uk-comment-primary' : message.selfOwned }">
            <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">
                        {{ message.user.name }}
                    </a></h4>
                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                        <li><a href="#">{{ message.created_at }}</a></li>
                    </ul>
                </div>
            </header>
            <div class="uk-comment-body">
                <p>{{ message.body }}</p>
            </div>
        </article>

    </div>
</template>

<script>
export default {
    props : ['message']
}
</script>

<style lang="css" scoped>
    .uk-comment-body {
        white-space: pre-wrap;
    }
</style>
