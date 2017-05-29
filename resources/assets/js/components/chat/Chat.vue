<template lang="html">
    <div class="uk-card uk-card-default uk-card-hover">
        <chat-messages></chat-messages>
        <form class="uk-form uk-padding-small">
            <textarea id="body"
                      rows="5"
                      cols="80"
                      class="uk-textarea"
                      v-model="body"
                      @keydown="handleMessageInput">
            </textarea>
            <span class="uk-text-meta">
                Hit return to send or Ctrl + Return for a new line
            </span>
        </form>
    </div>
</template>

<script>
export default {
    data () {
        return {
            body: null
        }
    },
    methods: {
        handleMessageInput (e) {
            if ( e.keyCode === 13 && !e.shiftKey) {
                e.preventDefault();
                this.send();
            }
        },
        send () {
            console.log(this.body);
        }
    }
}
</script>
