<template>
    <div>
        <h1>Voucher {{ company }}</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Voucher</th>
                    <th>Gratuito</th>
                    <th>Sconto</th>
                    <th>Data creazione</th>
                </tr>
            </thead>
            <tbody v-if="vouchers">
                <tr v-for="voucher in vouchers" :key="voucher.id">
                    <td>{{ voucher.id }}</td>
                    <td>{{ voucher.voucher }}</td>
                    <td>
                        <b-icon
                            icon="check"
                            font-scale="2"
                            v-if="voucher.gratuito"
                        ></b-icon>
                    </td>
                    <td>
                        {{ voucher.sconto }}
                    </td>
                    <td>{{ dateFormat(voucher.created_at) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { format } from "date-fns";
import http from "../http-common";

export default {
    mounted() {
        this.$store.dispatch("getCompanyVouchers", this.$route.params.id);
    },

    computed: {
        vouchers() {
            return this.$store.getters.getVouchers;
        },
        company() {
            return this.$store.getters.getCurrentCompany;
        },
    },
    methods: {
        dateFormat(date) {
            return format(new Date(date), "dd/mm/yyyy HH:MM");
        },
    },
};
</script>
