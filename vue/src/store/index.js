import { createStore } from 'vuex';
import bookState from "@/store/modules/books/book.state.js";
import userState from "@/store/modules/users/user.state.js";

const store = createStore({
    modules: {
        bookState,
        userState
    }
})

export default store;