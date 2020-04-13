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
                    <td>{{ dateFormat(voucher.created_at) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { format } from "date-fns";

export default {
    data() {
        return {
            company: "",
            vouchers: []
        };
    },
    created() {
        let uri = `http://localhost:8000/api/vouchers/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
            this.company = response.data.ragioneSociale;
            this.vouchers = response.data.vouchers;
        });
    },
    methods: {
        dateFormat(date) {
            return format(new Date(date), "dd/mm/yyyy HH:MM");
        }
    }
};
</script>
