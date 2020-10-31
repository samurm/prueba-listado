import { GET_NAVIGATION } from "./getters.type";
import { SET_NAVIGATION } from "./mutations.type";

const state = {
  navigation: true
};

const getters = {
  [GET_NAVIGATION](state) {
    return state.navigation;
  }
};

const mutations = {
  [SET_NAVIGATION](state, value) {
    state.navigation = value;
  }
};

const actions = {};

export default {
  state,
  getters,
  mutations,
  actions
};
