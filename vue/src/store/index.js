import { createStore } from 'vuex'
import axios from "axios";

const store = createStore({
    state () {
        return {
            userState: null,
            accessTokenState: null,
            bookState: null,
            numPagesState: null
        }
    },
    mutations: {
        async auth(state, user) {
            await axios.post('/', {
                    username: user.username,
                    password: user.password
                },
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => {
                    state.accessTokenState = res.data.accessToken
                })

            localStorage.accessToken = state.accessTokenState
        },

        async registration(state, user) {
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

        async getBooks(state) {
            await axios('/main')
                .then(res => {
                    state.bookState = res.data.data
                })
        },

        async getUserBooks(state) {
            await axios.get('/books', {
                headers: {
                    'Authorization': localStorage.getItem('accessToken')
                }
            })
                .then(res => {
                    state.bookState = res.data.data
                    state.numPagesState = res.data.numPages
                })
        },

        async switchPage(state, page) {
            axios.get(`/books?page=${page}`,
                {
                    headers: {
                        'Authorization': localStorage.getItem('accessToken')
                    }
                        .then(res => {
                            this.books = res.data.data
                            this.numPages = res.data.numPages
                        })
                })
        },

        async deleteBook(state, bookId) {
          await axios.delete(`/book/${bookId}/delete`, {
                headers: {
                    'Authorization': localStorage.getItem('accessToken')
                }
            })

            axios.get('/books', {
                headers: {
                    'Authorization': localStorage.getItem('accessToken')
                }
            })
                .then(res => {
                    state.bookState = res.data.data
                    state.numPagesState = res.data.numPages             })
        },

        async createBook(state, book) {
            let jsonId = JSON.stringify(book.userId)

            await axios.post('/create', {
                title: book.title,
                content: book.content,
                id: jsonId
            },
                {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Authorization': localStorage.getItem('accessToken')
                }
            })
        },

        async updateBook(state, book) {
            let jsonId = JSON.stringify(book.userId)

            await axios.post(`/book/${book.bookId}/update`, {
                title: book.title,
                content: book.content,
                id: jsonId
            },
                {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Authorization': localStorage.getItem('accessToken')
                }
            })
        },

        async getAuthors(state){
            axios.get('/authors')
                .then(res => {
                    state.userState = res.data.data
                })
        },

        async getContent(state, bookId) {
            axios.get(`/book/${bookId}/content`)
                .then(res => {
                    state.bookState = res.data.data
                })
        }
    },

    getters: {
        USERS: state => {
            return state.userState;
        },
        ACCESSTOKEN: state => {
            return state.accessTokenState;
        },
        BOOKS: state => {
            return state.bookState
        },
        NUMPAGES: state => {
            return state.numPagesState
        }
    }
    })

export default store