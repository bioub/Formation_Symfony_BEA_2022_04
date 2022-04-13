<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="contact_firstName"
        class="form-control-label">firstName</label>
        <input
          id="contact_firstName"
          v-model="item.firstName"
          :class="['form-control', !isValid('firstName') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('firstName')"
        class="invalid-feedback">{{ violations.firstName }}</div>
    </div>
    <div class="form-group">
      <label
        for="contact_lastName"
        class="form-control-label">lastName</label>
        <input
          id="contact_lastName"
          v-model="item.lastName"
          :class="['form-control', !isValid('lastName') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('lastName')"
        class="invalid-feedback">{{ violations.lastName }}</div>
    </div>
    <div class="form-group">
      <label
        for="contact_email"
        class="form-control-label">email</label>
        <input
          id="contact_email"
          v-model="item.email"
          :class="['form-control', !isValid('email') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('email')"
        class="invalid-feedback">{{ violations.email }}</div>
    </div>
    <div class="form-group">
      <label
        for="contact_phone"
        class="form-control-label">phone</label>
        <input
          id="contact_phone"
          v-model="item.phone"
          :class="['form-control', !isValid('phone') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('phone')"
        class="invalid-feedback">{{ violations.phone }}</div>
    </div>
    <div class="form-group">
      <label
        for="contact_tags"
        class="form-control-label">tags</label>
        <input
          id="contact_tags"
          v-model="item.tags"
          :class="['form-control', !isValid('tags') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('tags')"
        class="invalid-feedback">{{ violations.tags }}</div>
    </div>

    <button
      type="submit"
      class="btn btn-success">Submit</button>
  </form>
</template>

<script>
  import { find, get, isUndefined } from 'lodash';
  import { mapFields } from 'vuex-map-fields';
  import { mapActions } from 'vuex';

  export default {
  props: {
    handleSubmit: {
      type: Function,
      required: true,
    },

    values: {
      type: Object,
      required: true,
    },

    errors: {
      type: Object,
      default: () => {},
    },

    initialValues: {
      type: Object,
      default: () => {},
    }
  },

  mounted() {
  },

  computed: {

    // eslint-disable-next-line
    item() {
      return this.initialValues || this.values;
    },

    violations() {
      return this.errors || {};
    },
  },

  methods: {
    ...mapActions({
    }),

    isSelected(collection, id) {
      return find(this.item[collection], ['@id', id]) !== undefined;
    },

    isValid(key) {
      return isUndefined(get(this.violations, key));
    },
  },
};
</script>
