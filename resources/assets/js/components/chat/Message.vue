<template lang="html">
    <div class="uk-padding-small">
        <article class="uk-comment"
                 :class="{ 'uk-comment-primary' : message.selfOwned }">
            <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <h4 class="uk-text-small uk-margin-remove">
                        <a class="uk-link-reset" href="#">
                            {{ message.user.name }}
                            <span class="uk-text-meta">
                                {{ message.created_at }}
                            </span>
                        </a>
                    </h4>
                </div>
            </header>
            <div class="uk-text-small">
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
