<template lang="html">
    <div class="uk-overflow-auto uk-height-medium">
        <chat-message v-for="message in messages"
                      :key="message.id"
                      :message="message">
        </chat-message>
    </div>
</template>

<script>
export default {
    data () {
        return {
            messages: []
        }
    },
    mounted () {
        axios.get('/chat/messages').then( (response) => {
            this.messages = response.data
        });
    }
}
</script>
