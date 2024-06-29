import { defineStore } from "pinia";

export const useStores = defineStore("counter", {
    state: () => ({
      loggedIn: false,
      userInfo: {
        name: "",
        surname: "",
        email: "",
        token: "",
      },
    }),
    persist: {
      storage: persistedState.localStorage,
      paths: [
        "userInfo",
        "loggedIn",
      ],
    },
  
    actions: {
      /* -------------------------------------------------------------------------- */
      /*                                   SETTERS                                  */
      /* -------------------------------------------------------------------------- */
      setUser () {
        this.loggedIn = true;
        this.userInfo.email = email;
      },



      /* -------------------------------------------------------------------------- */
      /*                                   GETTERS                                  */
      /* -------------------------------------------------------------------------- */
      
    },
  });