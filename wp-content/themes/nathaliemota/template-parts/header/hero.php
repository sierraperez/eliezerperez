<section class="hero-header">
    <div class="interface">
        <div class="flex">
            <div class="text-top-site">
                <h1 class="hero-header__page-title">Transformer des idées en réalité numérique<span>.</span></h1>
                <p>Bienvenue sur ma page de projets WordPress ! Découvrez mes réalisations alliant créativité, fonctionnalité et design sur mesure. Que ce soit pour un site vitrine, un blog ou une boutique en ligne, chaque projet reflète mon engagement à transformer vos idées en solutions web performantes et esthétiques.</p>
                <div class="btn-contact__top">
                    <a href="#">
                        <button>Contact</button>
                    </a>
                </div>
            </div>
            <div class="img-top-site">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/eu.png" alt="Descrição da imagem">
            </div>

        </div>
    </div>
</section>

<section class="competences">
    <div class="interface">
        <h2 class="competences-title">Mes <span>Compétences</span></h2>
        <div class="flex">
            <div class="competences-box">
                <h3 class="competences-title__box">Langages/Frameworks</h3>

                <?php
                // Inclui o arquivo de ícones
                include get_template_directory() . '/template-parts/icons-langages.php';

                // Obtém a lista de ícones
                $icons_langages = get_icons_list_langages();

                // Exibe os ícones (exemplo para exibir ícones específicos)
                echo '<div class="all-icons">'; // Div principal para todos os ícones
                foreach ($icons_langages as $name => $icons_langages) {
                    echo '<div class="icon-box">';
                    echo $icons_langages; // Exibe o ícone SVG
                    echo '<p>' . ucfirst($name) . '</p>'; // Exibe o nome do ícone (capitalizado)
                    echo '</div>';
                }
                echo '</div>'; // Fecha a div principal
                ?>
            </div> <!-- competences-box-->

            <div class="competences-box">
                <h3 class="competences-title__box">Logiciels</h3>

                <?php
                // Inclui o arquivo de ícones
                include get_template_directory() . '/template-parts/icons-logiciels.php';

                // Obtém a lista de ícones
                $icons_logiciels = get_icons_list_logiciels();

                // Exibe os ícones (exemplo para exibir ícones específicos)
                echo '<div class="all-icons">'; // Div principal para todos os ícones
                foreach ($icons_logiciels as $name => $icons_logiciels) {
                    echo '<div class="icon-box">';
                    echo $icons_logiciels; // Exibe o ícone SVG
                    echo '<p>' . ucfirst($name) . '</p>'; // Exibe o nome do ícone (capitalizado)
                    echo '</div>';
                }
                echo '</div>'; // Fecha a div principal
                ?>
            </div> <!-- competences-box-->
        </div><!--flex-->
    </div><!--interface-->
</section><!--competences-->
<?php
get_footer();
?>