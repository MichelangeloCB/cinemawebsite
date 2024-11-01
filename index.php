<?php require_once 'cabecalho.php';?>
<section class="topo">
	<div class="container-fluid">
        <button class="btn btn-outline-light position-fixed top-0 end-0 mt-3 me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#faqOffcanvas" aria-controls="faqOffcanvas">
            <i class="bi bi-search"></i> Perguntas Frequentes
        </button>

        <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="faqOffcanvas" aria-labelledby="faqOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="faqOffcanvasLabel">Perguntas Frequentes - Cinemax</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                Como agendar uma sessão?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Para agendar uma sessão, visite nosso site ou aplicativo, selecione o filme desejado, escolha a data e horário, e siga as instruções para finalizar a compra dos ingressos.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                Quais são as formas de pagamento aceitas?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Aceitamos cartões de crédito e débito das principais bandeiras, além de PIX e dinheiro na bilheteria do cinema.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                Posso cancelar ou trocar meus ingressos?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Cancelamentos e trocas podem ser feitos até 1 hora antes do início da sessão. Entre em contato com nosso atendimento ao cliente para mais informações.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                Há desconto para estudantes e idosos?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sim, oferecemos meia-entrada para estudantes, idosos, pessoas com deficiência e seus acompanhantes, conforme previsto em lei. É necessário apresentar documento comprobatório na entrada.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                Posso levar comida e bebida de fora?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Por política do cinema, não é permitido entrar com alimentos e bebidas adquiridos fora do estabelecimento. Temos uma variedade de opções disponíveis em nossa bomboniere.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	    <!-- Inicio do Cliente  -->
    <?php if(isset($_COOKIE['cliente'])){
    
    ?>	
    	<div class="dropdown">
        	
            <a class="btn dropdown" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff">
                    <path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/>
                </svg>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Home</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="home.php" target="janela">Voltar para área inicial</a></li>
                    </ul>
                </li>
                <!-- <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Login</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="alterarcliente.php" target="janela">Alterar Conta</a></li>
                        <li><a class="dropdown-item" href="duvidaslogin.php" target="janela">Ajuda com Login</a></li>
                    </ul>
                </li> -->
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Cliente</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="alterarcliente2.php" target="janela">Alterar Dados</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Filme</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="buscarfilme.php" target="janela">Buscar Filme</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Agendamento</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastraragendamento.php" target="janela">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="buscaragendamento.php" target="janela">Buscar</a></li>
                        <li><a class="dropdown-item" href="listaragendamento.php" target="janela">Listar</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Sessão</a>
                    <ul class="dropdown-menu">
                    	<li><a class="dropdown-item" href="buscarsessao.php" target="janela">Buscar Sessão</a></li>
                    </ul>
                </li>
                <!-- <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Gênero</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="buscargenero.php" target="janela">Buscar Gênero</a></li>
                    </ul>
                </li> -->
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">LogOff</a>
                    <ul class="dropdown-menu">
                    	<li><a class="dropdown-item" href="logoff.php">LogOff</a></li>
                	</ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="CINEMAX">CINEMAX</div>
	<?php } ?>	
<!-- Fim do Cliente  -->
</ul>
</div>

<!-- Inicio do Usuario  -->
			<?php
			if(!(isset($_COOKIE['admin']))&&!(isset($_COOKIE['cliente']))){
				?>
				
        <div class="dropdown">
        
            <a class="btn dropdown" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff">
                    <path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/>
                </svg>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Home</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="home.php" target="janela">Voltar para área inicial</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Login</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastrarcliente.php" target="janela">Criar Conta</a></li>
                        <li><a class="dropdown-item" href="logincliente.php" target="janela">Entrar na Conta</a></li>
                        <li><a class="dropdown-item" href="duvidaslogin.php" target="janela">Ajuda com Login</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Filme</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="buscarfilme.php" target="janela">Buscar Filme</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Sessão</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="buscarsessao.php" target="janela">Buscar Sessão</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="CINEMAX">CINEMAX</div>

<!-- Fim do Usuario  -->

<!-- Inicio do Admin  -->	
		<?php } else if(isset($_COOKIE['admin'])){?>
		<div class="dropdown">
        	
            <a class="btn dropdown" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff">
                    <path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/>
                </svg>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Home</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="home.php" target="janela">Voltar para área inicial</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Login</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="alteraradmin.php" target="janela">Redefinir Senha</a></li>

                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Cliente</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastrarcliente.php" target="janela">Adicionar Cliente</a></li>
                        <li><a class="dropdown-item" href="buscarcliente.php" target="janela">Buscar Cliente</a></li>
                        <li><a class="dropdown-item" href="listarcliente.php" target="janela">Listar Cliente</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Filme</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastrarfilme.php" target="janela">Adicionar Filme</a></li>
                        <li><a class="dropdown-item" href="buscarfilme.php" target="janela">Buscar Filme</a></li>
                        <li><a class="dropdown-item" href="listarfilme.php" target="janela">Listar Filme</a></li>
                    </ul> 
                    <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Agendamento</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastraragendamento.php" target="janela">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="buscaragendamento.php" target="janela">Buscar</a></li>
                        <li><a class="dropdown-item" href="listaragendamento.php" target="janela">Listar</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Sessão</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastrarsessao.php" target="janela">Adicionar Sessão</a></li>
                        <li><a class="dropdown-item" href="buscarsessao.php" target="janela">Buscar Sessão</a></li>
                        <li><a class="dropdown-item" href="listarsessao.php" target="janela">Listar Sessão</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">Gênero</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastrargenero.php" target="janela">Adicionar Gênero</a></li>
                        <li><a class="dropdown-item" href="buscargenero.php" target="janela">Buscar Gênero</a></li>
                        <li><a class="dropdown-item" href="listargenero.php" target="janela">Listar Gênero</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown" href="#" data-bs-toggle="dropdown">LogOff</a>
                    <ul class="dropdown-menu">
                    	<li><a class="dropdown-item" href="logoff.php">LogOff</a></li>
                	</ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="CINEMAX">CINEMAX</div>




	<?php } ?>		

</section>

<!-- Inicio da Janela  -->
<section class="conteudo">
	<iframe src="home.php" class="janela" name="janela"></iframe>
</section>
<!-- Fim da Janela  -->

<!-- Inicio do Rodapé  -->
<section class="rodape"> 
	<div class="texto">
	<p>Cinema CineMax &reg;</p>
    <p> &#9742; (41)36663-7762</p>
</div>
<div class="outros">
	<div class="horarios">
    <ul class="meus-horarios">
   	<span class="material-symbols-outlined">
schedule
</span>
    	<li>Seg - Sex - 14h - 23h</li>
    	<li>Sab - 13h - 00h </li>
    	<li>Dom - 14h - 23h </li>

   </ul>
</div>
<div class="meio">
    <ul class="meus-horarios">
    	<span class="material-symbols-outlined">
fastfood
</span>
    	<li>Seg - Sex - 10 - 22h</li>
    	<li>Sab - 10 - 23h</li>
    	<li>Dom - 11 - 22h</li>
    
</ul>
</div>
    <div class="endereco">
    	<span class="material-symbols-outlined">
location_on
</span>
    	<span class="meu-endereco">Avenida Visconde de Taunay, 5146</span>
    	<div class="container mt-5">
        <button id="mapButton" class="btn btn-gold btn-lg rounded-pill shadow">
            <i class="bi bi-geo-alt-fill me-2"></i>
            Abrir localização no Maps
        </button>
    </div>
    </div>

    </div>

 </p>
<!--Fim do Rodapé-->
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('mapButton').addEventListener('click', function() {
            // Substitua estas coordenadas pela localização desejada
            const latitude = -23.550520;
            const longitude = -46.633308;
            const url = `https://www.google.com.br/maps/place/Plaza+Campos+Gerais/@-25.1005487,-50.1841067,3a,75y,141.31h,90t/data=!3m7!1e1!3m5!1shzuVuAyfQLefVObX_8bxOQ!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fpanoid%3DhzuVuAyfQLefVObX_8bxOQ%26cb_client%3Dmaps_sv.tactile.gps%26w%3D203%26h%3D100%26yaw%3D141.30792%26pitch%3D0%26thumbfov%3D100!7i16384!8i8192!4m7!3m6!1s0x94e81b250fd5990d:0x1e8b20886831b491!8m2!3d-25.101224!4d-50.1835145!10e5!16s%2Fg%2F11rw7psqcq?coh=205409&entry=ttu&g_ep=EgoyMDI0MTAyMy4wIKXMDSoASAFQAw%3D%3D`;
            window.open(url, '_blank');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');
            dropdownSubmenus.forEach(function (dropdownSubmenu) {
                dropdownSubmenu.addEventListener('mouseenter', function (e) {
                    var submenu = this.querySelector('.dropdown-menu');
                    if (submenu) {
                        submenu.style.display = 'block';
                    }
                });
                dropdownSubmenu.addEventListener('mouseleave', function (e) {
                    var submenu = this.querySelector('.dropdown-menu');
                    if (submenu) {
                        submenu.style.display = 'none';
                    }
                });
                var dropdownToggle = dropdownSubmenu.querySelector('.dropdown-toggle');
                if (dropdownToggle) {
                    dropdownToggle.addEventListener('click', function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        var submenu = this.nextElementSibling;
                        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
                    });
                }
            });
        });
    </script>

</body>
</html>