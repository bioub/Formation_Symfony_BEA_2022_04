import List from "../components/contact/List.vue";

export default [
  {
    name: "ContactList",
    path: "/contacts/",
    component: List
  },
  // {
  //   name: "ContactCreate",
  //   path: "/contacts/create",
  //   component: () =>
  //     import(/* webpackChunkName: "contact" */ "../components/contact/Create"),
  // },
  // {
  //   name: "ContactUpdate",
  //   path: "/contacts/edit/:id",
  //   component: () =>
  //     import(/* webpackChunkName: "contact" */ "../components/contact/Update"),
  // },
  // {
  //   name: "ContactShow",
  //   path: "/contacts/show/:id",
  //   component: () =>
  //     import(/* webpackChunkName: "contact" */ "../components/contact/Show"),
  // },
];
