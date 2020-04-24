<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new animal</div>
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
                            <label class="control-label">Animal nick</label>
                            <input type="text" v-model="animal.nick" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Animal photo</label>
                            <input type="file" v-on:change="onImageChange" class="form-control">
                            <div class="col-md-3" v-if="animal.image">
                                <img :src="animal.image" class="img-responsive" height="70" width="90">
                            </div>
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
        data: function () {
            return {
                animal: {
                    name: '',
                    type: '',
                    nick: '',
                    image: '',
                }
            }
        },
        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.animal.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            saveForm() {
                event.preventDefault();

                var app = this;
                var newAnimal = app.animal;

                axios.post('/api/animal', newAnimal)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        alert("Could not create animal");
                    });
            }
        }
    }
</script>
