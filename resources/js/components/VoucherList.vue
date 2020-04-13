<template>
    <div>
        <h1>Voucher</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Voucher</th>
                    <th>Gratuito</th>
                    <th>Sconto</th>
                    <th>Azienda</th>
                    <th>Data creazione</th>
                </tr>
            </thead>
            <tbody>
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
                    <td>{{ voucher.azienda.ragioneSociale }}</td>
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
    data() {
        return {
            vouchers: []
        };
    },
    created() {
        const uri = `/vouchers/`;

        http.get(uri).then(response => {
            this.vouchers = response.data;
        });
    },
    methods: {
        dateFormat(date) {
            return format(new Date(date), "dd/mm/yyyy HH:MM");
        }
    }
};
</script>
