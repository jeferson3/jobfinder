var navbarComponent = {
    props: {
        homeurl: {
            required: true,
            type: String
        },
        logomarca: {
            required: true,
            type: String
        },
        login: {
            required: true,
            type: String
        },
        auth: {
            required: true,
        },
        perfilurl: {
            required: true,
            type: String
        }
    },
    mounted(){
        console.log(this.auth);
    },
    template: `
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="navbar">
            <a class="navbar-brand" :href="homeurl">
                <img id="logomarca" :src="logomarca" alt="logomarca" />
                <strong>JobFinder</strong>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mr-5 mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a v-if="auth == 'false'" class="btn btn-outline-light text-uppercase font-weight-bold" :href="login">
                            acesso
                            <i class="fas fa-lock    "></i>
                        </a>
                        <a v-else class="btn btn-outline-light text-uppercase font-weight-bold" :href="perfilurl">
                            <i class="fa fa-user" aria-hidden="true"></i>    
                            Minha conta
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    `,
}