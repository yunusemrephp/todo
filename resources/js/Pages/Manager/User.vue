<template>
    <div class="container-fluid">
        <Title title="User Management"></Title>
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="text-right">
                            <b-button v-b-modal.new-modal class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> New User</b-button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table mb-0" style="font-size:.8125rem;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>E-Mail</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="row in data" :key="row.id">
                                    <td>{{ row.id }}</td>
                                    <td>{{ row.name }}</td>
                                    <td>{{ row.email }}</td>
                                    <td>
                                        <b-button v-b-modal.edit-modal class="btn-sm" @click="edit(row)"><i class="mdi mdi-account-edit ml-1"></i> Edit</b-button>
                                        <b-button v-b-modal.my-modal class="btn-sm"><i class="mdi mdi-trash-can ml-1"></i> Delete</b-button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <b-modal id="edit-modal" @hide="resetModal(name, email)">
            <template #modal-title>
                Edit User #{{ form.id }}
            </template>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="name" >User Name</label>
                    <input id="name" v-model="form.name" class="form-control" placeholder="User Name" required autofocus>
                    <span v-if="errors.name" class="invalid-feedback" style="display:block;" role="alert">
                        <strong>{{ errors.name[0] }}</strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="email" >E-Mail Adress</label>
                    <input id="email" v-model="form.email" class="form-control" placeholder="E-Mail" required autofocus>
                    <span v-if="errors.email" class="invalid-feedback" style="display:block;" role="alert">
                        <strong>{{ errors.email[0] }}</strong>
                    </span>
                </div>
            </form>
            <template #modal-footer>
                <button type="button" class="btn btn-success" @click="update(form)">Save</button>
            </template>
        </b-modal>
        <b-modal id="new-modal" @hide="resetModal()">
            <template #modal-title>
                Add New User
            </template>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="newuser_name" >User Name</label>
                    <input id="newuser_name" v-model="form.name" class="form-control" placeholder="User Name" required autofocus>
                    <span v-if="errors.name" class="invalid-feedback" style="display:block;" role="alert">
                        <strong>{{ errors.name[0] }}</strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="newuser_email" >E-Mail Adress</label>
                    <input id="newuser_email" v-model="form.email" class="form-control" placeholder="E-Mail" required autofocus>
                    <span v-if="errors.email" class="invalid-feedback" style="display:block;" role="alert">
                        <strong>{{ errors.email[0] }}</strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="newuser_password" >Password</label>
                    <input type="password" id="newuser_password" v-model="form.password" class="form-control" placeholder="Password" required autofocus>
                    <span v-if="errors.password" class="invalid-feedback" style="display:block;" role="alert">
                        <strong><nl2br tag="p" :text="errors.password[0]" /></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="newuser_password">Confirm Password</label>
                    <input type="password" id="newuser_password" v-model="form.password_confirmation" class="form-control" placeholder="Password Confirmation" required autofocus>
                </div>
            </form>
            <template #modal-footer>
                <button type="button" class="btn btn-success" @click="save(form)">Save</button>
            </template>
        </b-modal>
        <Toast v-if="toast.message" :toast="toast"></Toast>
    </div>
</template>

<script>
import Title from '../../Components/Title'
import Toast from '../../Components/Toast'
import Nl2br from 'vue-nl2br'

export default {
    props: [
        'data',
        'errors',
        'toast',
    ],
    components: {
        Title,
        Toast,
        Nl2br
    },
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                name: null,
            },
        }
    },
    methods: {
        save(data) {
            data._method = 'PATCH';
            this.$inertia.post('/manager/users/store/', data)
        },
        edit(data) {
            this.form = data;
            this.name = data.name;
            this.email = data.email;
        },
        update(data) {
            data._method = 'PATCH';
            this.$inertia.post('/manager/users/update/' + data.id, data)
        },
        deleteRow(data) {
            if (!confirm('Are you sure want to remove?')) return;
            data._method = 'DELETE';
            this.$inertia.post('/users/delete/' + data.id, data)
        },
        resetModal(name, email) {
            this.form.name = name
            this.form.email = email
            this.nameState = null
        },
        resetNewModal() {
            this.form.name = null
            this.form.email = null
        },
    },
}
</script>

<style>
.modal-backdrop {
    opacity: .5;
}
</style>
