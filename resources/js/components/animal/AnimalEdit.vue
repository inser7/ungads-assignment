<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit animal</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Animal name</label>
                            <input type="text" v-model="animal.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Animal type</label>
                            <input type="text" v-model="animal.type" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Animal Nick</label>
                            <input type="text" v-model="animal.nick" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Animal pick</label>
                            <input type="text" v-model="animal.picture_path" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        created() {
            let app = this;
            let id = app.$route.params.id;
            app.animalId = id;
            axios.get('/api/animal/' + id)
                .then(function (resp) {
                    app.animal = resp.data;
                    console.log(resp.data);
                })
                .catch(function () {
                    alert("Could not load your animal")
                });
        },
        data: function () {
            return {
                animalId: null,
                animal: {
                    name: '',
                    type: '',
                    nick: '',
                    picture_path: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newAnimal = app.animal;
                axios.patch('/api/animal/' + app.animalId, newAnimal)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create animal");
                    });
            }
        }
    }
</script>
