<template lang="html">
    <div class="uk-card uk-card-default uk-card-hover">
        <div class="uk-card-body">
            <ul class="uk-list uk-list-divider">
                <li>
                  <h4>
                      <span>
                        {{ users.length }} {{ pluralize('user', users.length) }} online
                      </span>
                  </h4>
                </li>
                <li v-for="user in users" :key="user.id">
                    <a href="#">{{ user.name }}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import Bus from '../../bus'
import pluralize from 'pluralize'

export default {
    data() {
        return {
            users: []
        }
    },
    mounted() {
        Bus.$on('users.here', (users) => {
            this.users = users
        })
        .$on('user.joined', (user) => {
            this.users.unshift(user)
        })
        .$on('user.left', (user) => {
            this.users = this.users.filter( (u) => {
                return u.id !== user.id
            })
        })
    },
    methods: {
        pluralize: pluralize
    }
}
</script>

<style lang="css">
</style>
