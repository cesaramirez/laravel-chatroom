<template lang="html">
    <div class="uk-card uk-card-default uk-card-hover">
        <div class="uk-card-body">
            <chat-messages></chat-messages>
            <form class="uk-form">
                <textarea id="body"
                          rows="8"
                          cols="80"
                          class="uk-textarea"
                          >
                </textarea>
                <span class="uk-text-meta">
                    Hit return to send or Ctrl + Return for a new line
                </span>
            </form>
        </div>
    </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
