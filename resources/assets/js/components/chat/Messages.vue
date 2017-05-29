<template lang="html">
    <div class="uk-overflow-auto uk-height-medium" ref="messages">
        <chat-message v-for="message in messages"
                      :key="message.id"
                      :message="message">
        </chat-message>
    </div>
</template>

<script>
import Bus from '../../bus.js'
export default {
    data () {
        return {
            messages: []
        }
    },
    methods: {
        removeMessage (id) {
            this.messages = this.messages.filter( (message) => {
                return message.id !== id
            })
        }
    },
    mounted () {
        axios.get('/chat/messages').then( (response) => {
            this.messages = response.data
        });

        Bus.$on('message.added', (message) => {
            this.messages.unshift(message);

            if (message.selfOwned) {
                this.$refs.messages.scrollTop = 0
            }
        })
        .$on('message.remove', (message) => {
            this.removeMessage(message.id)
        })
    }
}
</script>
