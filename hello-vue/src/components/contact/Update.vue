<template>
  <div>
    <h1>Edit {{ retrieved && retrieved['@id'] }}</h1>

    <div
      v-if="created"
      class="alert alert-success"
      role="status">{{ created['@id'] }} created.</div>
    <div
      v-if="updated"
      class="alert alert-success"
      role="status">{{ updated['@id'] }} updated.</div>
    <div
      v-if="isLoading || deleteLoading"
      class="alert alert-info"
      role="status">Loading...</div>
    <div
      v-if="error"
      class="alert alert-danger"
      role="alert">
      <span
        class="fa fa-exclamation-triangle"
        aria-hidden="true">{{ error }}</span>
    </div>
    <div
      v-if="deleteError"
      class="alert alert-danger"
      role="alert">
      <span
        class="fa fa-exclamation-triangle"
        aria-hidden="true">{{ deleteError }}</span>
    </div>

    <ContactForm
      v-if="retrieved"
      :handle-submit="onSendForm"
      :values="retrieved"
      :errors="violations"
      :initial-values="retrieved" />

    <router-link
      v-if="retrieved"
      :to="{ name: 'ContactList' }"
      class="btn btn-primary">Back to list</router-link>
    <button
      class="btn btn-danger"
      @click="del">Delete</button>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import ContactForm from './Form.vue';

export default {
  components: {
    ContactForm,
  },

  computed: {
    ...mapFields('contact/del', {
      deleteError: 'error',
      deleteLoading: 'isLoading',
      deleted: 'deleted',
    }),
    ...mapFields('contact/create', {
      created: 'created',
    }),
    ...mapFields('contact/update', {
      isLoading: 'isLoading',
      error: 'error',
      retrieved: 'retrieved',
      updated: 'updated',
      violations: 'violations',
    }),
  },

  watch: {
    // eslint-disable-next-line object-shorthand,func-names
    deleted: function(deleted) {
      if (!deleted) {
        return;
      }

      this.$router.push({ name: 'ContactList' });
    },
  },

  beforeDestroy() {
    this.reset();
  },

  created() {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      createReset: 'contact/create/reset',
      deleteItem: 'contact/del/del',
      delReset: 'contact/del/reset',
      retrieve: 'contact/update/retrieve',
      updateReset: 'contact/update/reset',
      update: 'contact/update/update',
      updateRetrieved: 'contact/update/updateRetrieved',
    }),

    del() {
      if (window.confirm('Are you sure you want to delete this contact ?')) {
        this.deleteItem(this.retrieved);
      }
    },

    reset() {
      this.updateReset();
      this.createReset();
    },

    onSendForm() {
      this.update(this.retrieved);
    },
  },
};
</script>
