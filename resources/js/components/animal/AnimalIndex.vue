<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createAnimal'}" class="btn btn-success">Create new animal</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Animal list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Nick</th>
                        <th>Photo</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(animal, index) in animals">
                        <td>{{ animal.name }}</td>
                        <td>{{ animal.type }}</td>
                        <td>{{ animal.nick }}</td>
                        <td>
                            <div class="col-md-3" v-if="animal.picture_path">
                                <img :src="'/images/'+ animal.picture_path" class="img-responsive" height="70" width="90">
                            </div>
                        </td>
                        <td>
                            <router-link :to="{name: 'editAnimal', params: {id: animal.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(animal.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                animals: []
            }
        },
        created() {
            var app = this;
            axios.get('/api/animal')
                .then(function (resp) {
                    app.animals = resp.data;
                })
                .catch(function (resp) {
                    alert("Could not load animals");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/animal/' + id)
                        .then(function (resp) {
                            app.animals.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete animals");
                        });
                }
            }
        }
    }
</script>
