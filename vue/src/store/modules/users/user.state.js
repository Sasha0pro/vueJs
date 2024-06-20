import axios from "axios";

const state = {
    users: null,
    accessToken: null,
}

const getters = {
    USERS: state => {
        return state.users;
    },
    ACCESSTOKEN: state => {
        return state.accessToken;
    }
}

const mutations = {
    setAccessToken(state, accessToken) {
        state.accessToken = accessToken
    },
    setUsers(state, users) {
        state.users = users
    }
}

const actions = {
    async auth({commit, state}, user) {
        const response = await axios.post('/', {
                username: user.username,
                password: user.password
            },
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
        commit('setAccessToken', response.data.accessToken)

        localStorage.accessToken = state.accessToken
    },

    async registration({commit}, user) {
        await axios.post('/registration', {
                username: user.username,
                password: user.password
            },
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
    },

    async getAuthors({commit}){
        const response = await axios.get('/authors')
        commit('setUsers', response.data.data)
    },
}

export default {
    state,
    mutations,
    getters,
    actions
}