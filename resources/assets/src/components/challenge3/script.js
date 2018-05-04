import Vue from "vue";

// register the grid component
export default Vue.component('challenge3', {
    template: '#grid-template',
    props: {
        dataSet: Array,
        columns: Object
    },
    filters: {
        capitalize: function (str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    },
    methods: {
        sortBy: function (key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1
        },
    }
});