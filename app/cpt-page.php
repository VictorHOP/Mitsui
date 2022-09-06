<?php

// Change dashboard Posts to Blog
function cp_change_post_object()
{
    $get_post_type = get_post_type_object('post');
    $get_post_type->labels->menu_name = 'Blog';
}

add_action('init', 'cp_change_post_object');


function cp_change_page()
{
    $get_post_type = get_post_type_object('page');
    $get_post_type->exclude_from_search = true;
}

add_action('init', 'cp_change_page');


function detalhes_pagina($post)
{
    $page_imagem = get_post_meta($post->ID, 'page_imagem', true);
?>
    <table class="form-table">
        <tr>
            <td colspan="2">
                <h3>Imagem Topo:</h3>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        var file_frame;

                        jQuery('.clear_image_button').on('click', function() {
                            jQuery('.page_image').val('');
                            jQuery('.page_imagem').val('');
                        });

                        jQuery('.upload_image_button').on('click', function(event) {
                            event.preventDefault();

                            if (file_frame) {
                                file_frame.open();
                                return;
                            }

                            file_frame = wp.media.frames.file_frame = wp.media({
                                title: 'Imagem da Home',
                                multiple: false
                            });

                            file_frame.on('select', function() {
                                attachment = file_frame.state().get('selection').first().toJSON();
                                jQuery('.page_image').val(attachment.url);
                                jQuery('.page_imagem').val(attachment.id);
                            });

                            file_frame.open();
                        });
                    });
                </script>
                <?php $img = wp_get_attachment_image_src($page_imagem, 'full'); ?>
                <input type="text" name="page_image" class="page_image" size="40" style="width: 100%;" value="<?php echo $img[0]; ?>" readonly="true" />
                <input type="hidden" name="page_imagem" class="page_imagem" value="<?php echo $page_imagem; ?>" readonly="true" /><br><br>
                <input type="button" class="upload_image_button button" value="Adicionar Imagem" />
                <input type="button" class="clear_image_button button" value="Remove Imagem" />
                <hr />
            </td>
        </tr>
    </table>
<?php
}

function page_quemsomos($post)
{
    $sobre_mrcla = get_post_meta($post->ID, 'quemsomos_sobre_mrcla', true);
    $missao = get_post_meta($post->ID, 'quemsomos_missao', true);
    $visao = get_post_meta($post->ID, 'quemsomos_visao', true);
    $valores = get_post_meta($post->ID, 'quemsomos_valores', true);
    $equipe = get_post_meta($post->ID, 'quemsomos_equipe', true);
    $downloads = get_post_meta($post->ID, 'quemsomos_downloads', true);
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_button').on('click', function() {
                jQuery(this).siblings('.equipe').val('');
                jQuery(this).siblings('.equipe_texto').val('');
            });

            jQuery('.upload_button').on('click', function() {
                id = jQuery(this).parent().find('.equipe');
                text = jQuery(this).parent().find('.equipe_texto');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).siblings('.custom_repeatable').find('li:last').clone(true);
                fieldLocation = jQuery(this).siblings('.custom_repeatable').find('li:last');
                jQuery('input[type="hidden"], input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation);
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table style="width:100%;">
        <tr>
            <th>Sobre MRCLA</th>
            <td>
                <textarea name="quemsomos_sobre_mrcla" class="translate" rows="3" style="width:100%;"><?php echo $sobre_mrcla; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Missão</th>
            <td>
                <textarea name="quemsomos_missao" class="translate" rows="3" style="width:100%;"><?php echo $missao; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Visão</th>
            <td>
                <textarea name="quemsomos_visao" class="translate" rows="3" style="width:100%;"><?php echo $visao; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Valores</th>
            <td>
                <textarea name="quemsomos_valores" class="translate" rows="3" style="width:100%;"><?php echo $valores; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Nossa Equipe</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($equipe) {
                        foreach ($equipe as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <input type="text" name="quemsomos_equipe[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" placeholder="Nome do colaborador" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br><br>
                                <input type="text" name="quemsomos_equipe[<?php echo $i; ?>][1]" value="<?php echo $row[1]; ?>" placeholder="Cargo" />

                                <br><br>
                                <input type="hidden" name="quemsomos_equipe[<?php echo $i; ?>][2]" class="equipe" value="<?php echo $row[2]; ?>" />
                                <input type="text" name="quemsomos_equipe_texto" class="equipe_texto" value="<?php echo wp_get_attachment_url($row[2]); ?>" readonly="readonly" />
                                <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                                <input type="button" class="clear_button button" value="Remove Arquivo" />

                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>

                            <span class="sort hndle">|||</span><br>
                            <input type="text" name="quemsomos_equipe[<?php echo $i; ?>][0]" placeholder="Nome do colaborador" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br><br>
                            <input type="text" name="quemsomos_equipe[<?php echo $i; ?>][1]" placeholder="Cargo" />

                            <br><br>
                            <input type="hidden" name="quemsomos_equipe[<?php echo $i; ?>][2]" class="equipe" value="" />
                            <input type="text" name="quemsomos_equipe_texto" class="equipe_texto" value="" readonly="readonly" />
                            <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                            <input type="button" class="clear_button button" value="Remove Arquivo" />
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
        <tr>
            <th>Downloads</th>
            <td>
                <hr>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($downloads) {
                        foreach ($downloads as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="hidden" name="quemsomos_downloads[<?php echo $i; ?>]" class="downloads" value="<?php echo $row; ?>" />
                                <input type="text" name="quemsomos_downloads_texto" class="downloads_texto" value="<?php echo wp_get_attachment_url($row); ?>" readonly="readonly" />
                                <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                                <input type="button" class="clear_button button" value="Remove Arquivo" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="hidden" name="quemsomos_downloads[<?php echo $i; ?>]" class="downloads" value="" />
                            <input type="text" name="quemsomos_downloads_texto" class="downloads_texto" value="" readonly="readonly" />
                            <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                            <input type="button" class="clear_button button" value="Remove Arquivo" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
    </table>
<?php
}


function page_produtoseservicos($post)
{
    $oque_fazemos = get_post_meta($post->ID, 'produtoseservicos_oque_fazemos', true);
    $produtos_servicos = get_post_meta($post->ID, 'produtoseservicos_produtos_servicos', true);
    $swiper_produtos = get_post_meta($post->ID, 'produtoseservicos_swiper', true);

?>

    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_button').on('click', function() {
                jQuery(this).siblings('.imagem').val('');
                jQuery(this).siblings('.equipe_texto').val('');
            });

            jQuery('.upload_button').on('click', function() {
                id = jQuery(this).parent().find('.imagem');
                text = jQuery(this).parent().find('.imagem_texto');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.clear_butto').on('click', function() {
                jQuery(this).siblings('.imagem').val('');
                jQuery(this).siblings('.equipe_texto').val('');
            });

            jQuery('.upload_butto').on('click', function() {
                id = jQuery(this).parent().find('.image');
                text = jQuery(this).parent().find('.imagem_text');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquiv',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });


            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).siblings('.custom_repeatable').find('li:last').clone(true);
                fieldLocation = jQuery(this).siblings('.custom_repeatable').find('li:last');
                jQuery('input[type="hidden"], input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation);
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>

    <table>

        <tr>
            <th>Seção o que fazemos</th>
            <td>
                <br><br>
                <label for="">1 Bloco esquerdo</label>
                <textarea name="produtoseserv[0]" cols="100" rows="5" placeholder="Primeiro bloco o que fazemos"><?php echo $oque_fazemos[0]; ?></textarea><br><br>

                <label for="">foto 1 Bloco</label>
                <input type="hidden" name="produtoseserv[2]" class="imagem" value="<?php echo $oque_fazemos[2]; ?>" />
                <input type="text" name="produtoseserv_texto[2]" class="imagem_texto" value="<?php echo wp_get_attachment_url($oque_fazemos[2]); ?>" readonly="readonly" />
                <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                <input type="button" class="clear_button button" value="Remove Arquivo" /> <br><br>

                <label for="">2 Bloco direito</label>
                <textarea name="produtoseserv[1]" cols="100" rows="5" placeholder="Segundo bloco o que fazemos"><?php echo $oque_fazemos[1]; ?></textarea> <br><br>

                <label for="">foto 2 Bloco</label>
                <input type="hidden" name="produtoseserv[3]" class="image" value="<?php echo $oque_fazemos[3]; ?>" />
                <input type="text" name="produtoseserv_texto[3]" class="imagem_text" value="<?php echo wp_get_attachment_url($oque_fazemos[3]); ?>" readonly="readonly" />
                <input type="button" class="upload_butto button" value="Adicionar Arquivo" />
                <input type="button" class="clear_butto button" value="Remove Arquivo" /> <br><br>


                <hr>
            </td>
        </tr>

        <tr>
            <th> Serviços e Produtos</th>
            <td>
                <label for="">1º titulo</label><br>
                <input type="text" name="produtoseservicos[0]" placeholder="1º tiulo" value="<?php echo $produtos_servicos[0]; ?>"><br><br>
                <label for="">1º texto</label><br>
                <textarea name="produtoseservicos[1]" cols="100" rows="2" placeholder="Insira o texto aqui"><?php echo $produtos_servicos[1]; ?></textarea><br><br>

                <label for="">2º titulo</label><br>
                <input type="text" name="produtoseservicos[2]" placeholder="1º tiulo" value="<?php echo $produtos_servicos[2]; ?>"><br><br>
                <label for="">2º texto</label><br>
                <textarea name="produtoseservicos[3]" cols="100" rows="2" placeholder="Insira o texto aqui"><?php echo $produtos_servicos[3]; ?></textarea><br><br>

                <label for="">3º titulo</label><br>
                <input type="text" name="produtoseservicos[4]" placeholder="1º tiulo" value="<?php echo $produtos_servicos[4]; ?>"><br><br>
                <label for="">3º texto</label><br>
                <textarea name="produtoseservicos[5]" cols="100" rows="2" placeholder="Insira o texto aqui"><?php echo $produtos_servicos[5]; ?></textarea><br><br>

                <label for="">4º titulo</label><br>
                <input type="text" name="produtoseservicos[6]" placeholder="1º tiulo" value="<?php echo $produtos_servicos[6]; ?>"><br><br>
                <label for="">4º texto</label><br>
                <textarea name="produtoseservicos[7]" cols="100" rows="2" placeholder="Insira o texto aqui"><?php echo $produtos_servicos[7]; ?></textarea><br><br>
                <hr>
            </td>
        </tr>

        <tr>
            <th>Tipos de Vagões</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($swiper_produtos) {
                        foreach ($swiper_produtos as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <input type="text" name="produtoseservicos_swiper[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" placeholder="Tipo do Vagão" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br><br>
                                <textarea name="produtoseservicos_swiper[<?php echo $i; ?>][1]" cols="100" rows="5" placeholder="Descrição do vagão"><?php echo $row[1]; ?></textarea>
                                <br><br>
                                <input type="hidden" name="produtoseservicos_swiper[<?php echo $i; ?>][2]" class="produtos_swiper" value="<?php echo $row[2]; ?>" />
                                <input type="text" name="produtoseservicos_swiper_texto" class="produtos_swiper_texto" value="<?php echo wp_get_attachment_url($row[2]); ?>" readonly="readonly" />
                                <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                                <input type="button" class="clear_button button" value="Remove Arquivo" />

                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>

                            <span class="sort hndle">|||</span><br>
                            <input type="text" name="produtoseservicos_swiper[<?php echo $i; ?>][0]" placeholder="Tipo do Vagão" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br><br>
                            <input type="text" name="produtoseservicos_swiper[<?php echo $i; ?>][1]" placeholder="Descrição do vagão" />

                            <br><br>
                            <input type="hidden" name="produtoseservicos_swiper[<?php echo $i; ?>][2]" class="produtos_swiper" value="" />
                            <input type="text" name="produtoseservicos_swiper_texto" class="produtos_swiper_texto" value="" readonly="readonly" />
                            <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                            <input type="button" class="clear_button button" value="Remove Arquivo" />
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
    </table>

<?php } ?>

<?php function page_segmentos($post)
{
    $segmentos_swiper = get_post_meta($post->ID, 'segmentos_swiper', true);
?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var file_frame;
            var text;

            jQuery('.clear_button').on('click', function() {
                jQuery(this).siblings('.segmentos_swiper').val('');
                jQuery(this).siblings('.segmentos_swiper_texto').val('');
            });

            jQuery('.upload_button').on('click', function() {
                id = jQuery(this).parent().find('.segmentos_swiper');
                text = jQuery(this).parent().find('.segmentos_swiper_texto');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });

        });
    </script>
    <table style="width:100%;">
        <tr>
            <th>Tipos de Segmentos e Setores</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($segmentos_swiper) {
                        foreach ($segmentos_swiper as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <input type="text" name="segmentos_swiper[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" placeholder="Nome do segmento" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br><br>
                                <br><br>
                                <input type="hidden" name="segmentos_swiper[<?php echo $i; ?>][1]" class="segmentos_swiper" value="<?php echo $row[1]; ?>" />
                                <input type="text" name="segmentos_swiper_texto" class="segmentos_swiper_texto" value="<?php echo wp_get_attachment_url($row[1]); ?>" readonly="readonly" />
                                <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                                <input type="button" class="clear_button button" value="Remove Arquivo" />

                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>

                            <span class="sort hndle">|||</span><br>
                            <input type="text" name="segmentos_swiper[<?php echo $i; ?>][0]" placeholder="Nome do segmento" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br><br>

                            <br><br>
                            <input type="hidden" name="segmentos_swiper[<?php echo $i; ?>][1]" class="segmentos_swiper" value="" />
                            <input type="text" name="segmentos_swiper_texto" class="segmentos_swiper_texto" value="" readonly="readonly" />
                            <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                            <input type="button" class="clear_button button" value="Remove Arquivo" />
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <hr>
            </td>
        </tr>

        <tr>
            <th>Princípios</th>
            <td>
                <textarea name="missaoval[8]" cols="30" rows="3" class="translate" style="width:100%;"><?php echo $missaovalores[8]; ?></textarea><br><br>
                <input type="text" name="missaoval[9]" class="missaovalores" size="40" style="width: 100%;" value="<?php echo $missaovalores[9]; ?>" readonly="true" />
                <input type="button" class="upload_missao_button button" value="Adicionar Imagem" />
                <input type="button" class="clear_missao_button button" value="Remove Imagem" />
            </td>
        </tr>
    </table>
<?php
}

function page_parcerias($post)
{
    $parcerias = get_post_meta($post->ID, 'parcerias', true);
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;

            jQuery('.clear_parcerias_button').on('click', function() {
                jQuery(this).siblings('.parcerias').val('');
            });

            jQuery('.upload_parcerias_button').on('click', function() {
                text = jQuery(this).parent().find('.parcerias');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Imagem',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
                fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
                jQuery('input[type="hidden"], input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation, jQuery(this).closest('td'))
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table style="width:100%;">
        <tr>
            <th>Parceiros</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($parcerias) {
                        foreach ($parcerias as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <input type="text" name="parcerias[<?php echo $i; ?>][2]" value="<?php echo $row[2]; ?>" placeholder="Nome" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <textarea name="parcerias[<?php echo $i; ?>][0]" class="translate" rows="3" style="width:100%;"><?php echo $row[0]; ?></textarea><br>
                                <input type="text" name="parcerias[<?php echo $i; ?>][3]" value="<?php echo $row[3]; ?>" placeholder="Link" />
                                <input type="text" name="parcerias[<?php echo $i; ?>][1]" class="parcerias" size="40" style="width: 100%;" value="<?php echo $row[1]; ?>" readonly="true" />
                                <input type="button" class="upload_parcerias_button button" value="Adicionar Imagem" />
                                <input type="button" class="clear_parcerias_button button" value="Remove Imagem" />
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span><br>
                            <input type="text" name="parcerias[<?php echo $i; ?>][2]" value="" placeholder="Nome" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <textarea name="parcerias[<?php echo $i; ?>][0]" class="translate" rows="3" style="width:100%;"></textarea><br>
                            <input type="text" name="parcerias[<?php echo $i; ?>][3]" value="" placeholder="Link" />
                            <input type="text" name="parcerias[<?php echo $i; ?>][1]" class="parcerias" size="40" style="width: 100%;" value="" readonly="true" />
                            <input type="button" class="upload_parcerias_button button" value="Adicionar Imagem" />
                            <input type="button" class="clear_parcerias_button button" value="Remove Imagem" />
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
    </table>
<?php
}

function page_imprensa($post)
{
    $imprensa_downloads = get_post_meta($post->ID, 'imprensa_downloads', true);
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_arquivo_button').on('click', function() {
                jQuery(this).siblings('.imprensa_downloads').val('');
                jQuery(this).siblings('.imprensa_downloads_texto').val('');
            });

            jQuery('.upload_arquivo_button').on('click', function() {
                id = jQuery(this).parent().find('.imprensa_downloads');
                text = jQuery(this).parent().find('.imprensa_downloads_texto');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
                fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
                jQuery('input[type="hidden"], input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation, jQuery(this).closest('td'))
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table>
        <tr>
            <th>Downloads</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($imprensa_downloads) {
                        foreach ($imprensa_downloads as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="hidden" name="imprensa_downloads[<?php echo $i; ?>]" class="imprensa_downloads" value="<?php echo $row; ?>" />
                                <input type="text" name="imprensa_downloads_texto" class="imprensa_downloads_texto" value="<?php echo wp_get_attachment_url($row); ?>" readonly="readonly" />
                                <input type="button" class="upload_arquivo_button button" value="Adicionar Arquivo" />
                                <input type="button" class="clear_arquivo_button button" value="Remove Arquivo" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="hidden" name="imprensa_downloads[<?php echo $i; ?>]" class="imprensa_downloads" value="" />
                            <input type="text" name="imprensa_downloads_texto" class="imprensa_downloads_texto" value="" readonly="readonly" />
                            <input type="button" class="upload_arquivo_button button" value="Adicionar Arquivo" />
                            <input type="button" class="clear_arquivo_button button" value="Remove Arquivo" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
    </table>
<?php
}

function nossa_atuacao($svg = false)
{
    $atuacoes = array(
        'publicacoes-tecnicas' => __('Publicações técnicas', 'iqa'),
        'treinamentos' => __('Treinamentos', 'iqa'),
        'laboratorio-de-ensaios' => __('Laboratório de ensaios', 'iqa'),
        'homologacao-de-produtos' => __('Homologacao de produtos', 'iqa'),
        'forum-de-qualidade' => __('Fórum de qualidade', 'iqa'),
        'certificacao-de-produtos' => __('Certificacao de produtos', 'iqa'),
        'certificacao-de-sistemas' => __('Certificacao de sistemas', 'iqa'),
        'certificacao-de-servicos-automotivos' => __('Certificacao de servicos automotivos', 'iqa'),
    );

    $icons = array(
        'publicacoes-tecnicas' => '<svg viewBox="0 0 27 30" xmlns="http://www.w3.org/2000/svg"><path d="M3.40188 0C1.52869 0 0 1.54097 0 3.43287V24.4722C0 26.3641 1.52787 27.9043 3.40188 27.9043H4.70497C4.7465 27.9043 4.78641 27.9002 4.8255 27.8936C5.34104 29.1297 6.55372 30 7.96187 30H23.5989C25.4721 30 27 28.4599 27 26.568V6.84355C27 4.95165 25.4721 3.4115 23.5989 3.4115H22.4384C22.427 1.52946 20.904 0.000821869 19.0381 0.000821869H3.40188V0ZM3.40188 1.60425H19.0389C20.0317 1.60425 20.838 2.41131 20.8494 3.40986H7.96187C6.08868 3.40986 4.56081 4.95 4.56081 6.8419V26.2992H3.40188C2.40176 26.2992 1.59059 25.4806 1.59059 24.4722V3.43287C1.59059 2.42364 2.40176 1.60425 3.40188 1.60425ZM7.96187 5.01575H23.5989C24.5991 5.01575 25.4094 5.83431 25.4094 6.84273V26.5671C25.4094 27.5764 24.5982 28.3941 23.5989 28.3941H7.96187C6.96175 28.3941 6.1514 27.5755 6.1514 26.5671V6.84273C6.1514 5.83349 6.96257 5.01575 7.96187 5.01575ZM10.5681 8.67052C10.1307 8.67052 9.77317 9.03131 9.77317 9.47265C9.77317 9.91398 10.1307 10.2756 10.5681 10.2756H20.9928C21.4301 10.2756 21.7876 9.91398 21.7876 9.47265C21.7876 9.03131 21.4301 8.67052 20.9928 8.67052H10.5681ZM10.5681 13.9304C10.1307 13.9304 9.77317 14.2912 9.77317 14.7325C9.77317 15.1738 10.1307 15.5354 10.5681 15.5354H20.9928C21.4301 15.5354 21.7876 15.1738 21.7876 14.7325C21.7876 14.2912 21.4301 13.9304 20.9928 13.9304H10.5681ZM10.5681 19.1902C10.1307 19.1902 9.77317 19.551 9.77317 19.9923C9.77317 20.4337 10.1307 20.7945 10.5681 20.7945H20.9928C21.4301 20.7945 21.7876 20.4337 21.7876 19.9923C21.7876 19.551 21.4301 19.1902 20.9928 19.1902H10.5681ZM10.5681 24.45C10.1307 24.45 9.77317 24.8117 9.77317 25.253C9.77317 25.6943 10.1307 26.0551 10.5681 26.0551H20.9928C21.4301 26.0551 21.7876 25.6943 21.7876 25.253C21.7876 24.8117 21.4301 24.45 20.9928 24.45H10.5681Z"/></svg>',
        'treinamentos' => '<svg viewBox="0 0 27 34" xmlns="http://www.w3.org/2000/svg"><path d="M27 21.9786C27 21.22 26.7445 20.525 26.3185 19.9815C25.8924 19.438 25.2965 19.0475 24.6192 18.9019L24.4494 18.8653V15.0488C24.4494 14.7912 24.3298 14.5501 24.1288 14.4038C24.0028 14.3112 23.8542 14.2642 23.7042 14.2634C23.6157 14.2634 23.528 14.2798 23.443 14.3134L21.4862 15.0876L21.3892 14.9816C20.213 13.6915 18.7834 12.7195 17.2166 12.1237L16.8443 11.9819L17.1628 11.7333C18.6808 10.5462 19.6652 8.6454 19.6652 6.50495C19.6652 4.71167 18.9745 3.08636 17.857 1.90826C16.7403 0.728662 15.2003 0 13.5004 0C11.8004 0 10.2597 0.728662 9.14296 1.90751C8.02619 3.08636 7.33475 4.71092 7.33475 6.50421C7.33475 8.64465 8.31989 10.5462 9.83793 11.7325L10.1564 11.9811L9.78415 12.123C8.21727 12.7195 6.78769 13.6908 5.61146 14.9809L5.51451 15.0869L3.55839 14.3127C3.47346 14.2791 3.385 14.2627 3.29724 14.2627C3.14791 14.2627 2.99929 14.3104 2.87332 14.4023C2.67233 14.5486 2.55272 14.7898 2.55272 15.0473V18.8638L2.38287 18.9004C1.70488 19.046 1.1097 19.4365 0.683652 19.98C0.255485 20.525 0 21.22 0 21.9786C0 22.7371 0.255485 23.4322 0.681529 23.9764C1.10757 24.5199 1.70276 24.9104 2.38075 25.056L2.5506 25.0926V29.1786C2.5506 29.5056 2.7431 29.799 3.03397 29.914L13.2385 33.9507H13.2378C13.3206 33.9836 13.4098 34 13.4996 34C13.5888 34 13.678 33.9836 13.7615 33.9507H13.7608L23.9653 29.914C24.2555 29.799 24.448 29.5056 24.448 29.1786V25.0926L24.6178 25.056C25.2958 24.9104 25.8917 24.5199 26.3178 23.9764C26.7445 23.4322 27 22.7371 27 21.9786ZM8.82307 6.50421C8.82307 5.14468 9.3482 3.90984 10.1946 3.01693C11.0403 2.12402 12.2109 1.57006 13.5004 1.57006C14.7891 1.57006 15.9597 2.12402 16.8061 3.01693C17.6525 3.90909 18.1776 5.14394 18.1776 6.50421C18.1776 7.86373 17.6525 9.09857 16.8061 9.99148C15.9604 10.8844 14.7898 11.4384 13.5004 11.4384C12.2116 11.4384 11.041 10.8844 10.1946 9.99148C9.3482 9.09857 8.82307 7.86373 8.82307 6.50421ZM3.82661 23.5479H2.97665C2.56688 23.5479 2.19391 23.3717 1.92498 23.088C1.65605 22.8043 1.48832 22.4108 1.48903 21.9786C1.48903 21.5463 1.65605 21.1529 1.92498 20.8692C2.19391 20.5854 2.56688 20.4093 2.97665 20.4093H3.82661V23.5479ZM12.7558 32.0813L4.03963 28.6336V25.3091V25.1261L4.20948 25.0896C4.52442 25.0216 4.80042 24.841 4.99858 24.5886C5.19674 24.3355 5.31493 24.0137 5.31493 23.6614V20.2973C5.31493 19.9449 5.19604 19.6224 4.99858 19.37C4.80042 19.1177 4.52371 18.9363 4.20948 18.8691L4.03963 18.8325V16.1829L12.7558 19.6306V32.0813ZM13.5004 18.2472L7.03892 15.6909L7.30856 15.4445C9.01698 13.8827 11.2074 13.0084 13.5004 13.0084C15.7933 13.0084 17.983 13.8827 19.6921 15.4445L19.9618 15.6909L13.5004 18.2472ZM22.9604 18.8317L22.7905 18.8683C22.4756 18.9355 22.1989 19.1169 22.0014 19.3693C21.8033 19.6224 21.6851 19.9441 21.6851 20.2965V23.6606C21.6851 24.013 21.804 24.3355 22.0014 24.5879C22.1996 24.8402 22.4763 25.0216 22.7905 25.0896L22.9604 25.1261V28.6336L14.5315 31.9678L14.2449 32.0813V19.6298L22.9611 16.1821V18.8317H22.9604ZM25.075 23.088C24.8061 23.3717 24.4331 23.5479 24.0234 23.5479H23.1734V20.4085H24.0234C24.4331 20.4085 24.8061 20.5847 25.075 20.8684C25.3439 21.1521 25.5117 21.5456 25.511 21.9778C25.5117 22.4108 25.3439 22.805 25.075 23.088Z"/></svg>',
        'laboratorio-de-ensaios' => '<svg viewBox="0 0 21 29" xmlns="http://www.w3.org/2000/svg"><path d="M20.5634 22.918L14.7917 10.9495V1.69945H15.5767C16.0188 1.69945 16.3772 1.31897 16.3772 0.849727C16.3772 0.380487 16.0188 0 15.5767 0H5.42299C4.98092 0 4.62245 0.380487 4.62245 0.849727C4.62245 1.31897 4.98092 1.69945 5.42299 1.69945H6.20804V10.9487L0.436325 22.918C-0.193105 24.2238 -0.13891 25.7498 0.581876 27.0014C1.30266 28.253 2.55765 29 3.93961 29H17.0601C18.442 29 19.697 28.253 20.4178 27.0014C21.1386 25.7498 21.1936 24.2238 20.5634 22.918ZM7.72005 11.5412C7.77812 11.4212 7.80832 11.2889 7.80832 11.1541V1.69945H13.1906V11.1533C13.1906 11.288 13.2208 11.4204 13.2789 11.5403L15.5063 16.1588H5.49344L7.72005 11.5412ZM17.0601 27.3005H3.93961C3.11972 27.3005 2.37494 26.8576 1.94758 26.1147C1.7068 25.6972 1.59144 25.228 1.60305 24.7596C1.60924 24.4991 1.65492 24.2394 1.74009 23.9887C1.77415 23.8885 4.67433 17.859 4.67433 17.859H16.3261C16.3261 17.859 19.1845 23.7899 19.2046 23.8392C19.3254 24.135 19.3897 24.4473 19.3974 24.7596C19.409 25.228 19.2937 25.6972 19.0529 26.1147C18.6248 26.8568 17.88 27.3005 17.0601 27.3005Z"/></svg>',
        'homologacao-de-produtos' => '<svg viewBox="0 0 31 30" xmlns="http://www.w3.org/2000/svg"><path d="M15.4994 0C15.3842 0 15.269 0.0245014 15.1621 0.0727139L0.460996 6.71181C0.206178 6.8272 0.0354822 7.06194 0.00526334 7.32671C0.00526334 7.32592 0.00526334 7.32829 0.00526334 7.3275C0.00608007 7.31802 0.00444662 7.32987 0.00444662 7.33857C0.00362989 7.34805 0.00362989 7.35991 0.00281317 7.37176C0.00199644 7.38362 0.00117971 7.39547 0.000362989 7.40417C-0.000453736 7.41286 0.000362989 7.44053 0.000362989 7.41207V23.5356C0.000362989 23.8525 0.198827 24.1363 0.502649 24.254L15.2037 29.9447C15.2993 29.9818 15.3997 30 15.5002 30C15.6006 30 15.7019 29.9818 15.7967 29.9447L30.4977 24.254C30.8015 24.1363 31 23.8525 31 23.5356V7.41207C31 7.44132 31 7.41286 31 7.40417C30.9992 7.39547 30.9984 7.38362 30.9975 7.37176C30.9967 7.35991 30.9967 7.34726 30.9959 7.33857C30.9951 7.32908 30.9926 7.30853 30.9951 7.32987V7.32908C30.9649 7.06273 30.7942 6.82799 30.5385 6.71181L15.8375 0.0727139C15.7305 0.0245014 15.6153 0 15.4994 0ZM15.4994 1.62658L28.1905 7.35833L23.0214 9.35875L10.1122 4.05854L15.4226 1.66056L15.4994 1.62658ZM8.16435 4.93901L20.9159 10.1736L15.5002 12.2705L2.80827 7.35754L8.09166 4.97221L8.16435 4.93901ZM1.59706 8.55415L14.7006 13.6259V28.0841L1.59706 23.0124V8.81339V8.55415ZM29.4017 8.55415V23.0124L16.5464 27.9885L16.2981 28.0849V13.6259L29.4017 8.55415Z"/></svg>',
        'forum-de-qualidade' => '<svg viewBox="0 0 39 39" xmlns="http://www.w3.org/2000/svg"><path d="M23.6697 16.2017L18.039 21.2343L15.3367 18.6033C15.037 18.3109 14.5433 18.3049 14.2359 18.5885C13.9276 18.872 13.9206 19.3384 14.2202 19.6301L17.4608 22.7786C17.762 23.0651 18.2486 23.0747 18.5624 22.8008L24.7556 17.2737C24.9058 17.1397 24.9942 16.9539 24.9997 16.7584C25.0052 16.563 24.9285 16.3735 24.7869 16.2314C24.4849 15.9345 23.9881 15.9219 23.6697 16.2017Z"/><path d="M36.2243 15.0316L36.4931 10.2116C36.5119 9.88836 36.3359 9.58467 36.0459 9.43974L31.7518 7.26992L29.58 2.97831C29.4325 2.6909 29.1303 2.51585 28.8077 2.53132L23.9768 2.79186L19.9516 0.134342C19.6803 -0.0447806 19.3292 -0.0447806 19.0571 0.134342L15.0319 2.79186L10.21 2.524C9.88579 2.50527 9.58274 2.68113 9.43773 2.97099L7.26587 7.26178L2.97266 9.4316C2.68428 9.57897 2.50994 9.88103 2.52542 10.2035L2.79344 15.0235L0.134417 19.0472C-0.0448058 19.3183 -0.0448058 19.6693 0.134417 19.9412L2.78529 23.9723L2.51646 28.7923C2.49772 29.1163 2.67369 29.42 2.9637 29.5641L7.25773 31.7339L9.42877 36.0256C9.57623 36.313 9.87765 36.488 10.2011 36.4725L15.023 36.2039L19.0482 38.8614C19.3178 39.0462 19.673 39.0462 19.9427 38.8614L23.9679 36.2039L28.7906 36.4725C29.114 36.4913 29.4179 36.3154 29.5629 36.0256L31.7339 31.7339L36.028 29.5641C36.3155 29.4168 36.4907 29.1147 36.4752 28.7923L36.2072 23.9723L38.8662 19.9493C39.0446 19.6782 39.0446 19.3265 38.8662 19.0553L36.2243 15.0316ZM34.7115 23.3054C34.6121 23.4512 34.5665 23.6254 34.5819 23.8013L34.8337 28.3607L30.7759 30.4084C30.6211 30.4858 30.4957 30.612 30.4183 30.7659L28.3686 34.8214L23.8066 34.5698C23.6322 34.5633 23.4595 34.6089 23.3104 34.6992L19.5044 37.211L15.6991 34.6992C15.5672 34.6105 15.4108 34.5616 15.2519 34.5616H15.2112L10.6491 34.814L8.59946 30.7577C8.52207 30.603 8.39661 30.4776 8.24183 30.4003L4.1759 28.3607L4.42844 23.8013C4.43496 23.627 4.38934 23.4544 4.2981 23.3054L1.78572 19.5015L4.2981 15.6976C4.39749 15.5527 4.44392 15.3776 4.42844 15.2018L4.1759 10.6423L8.23368 8.5938C8.38846 8.51645 8.51392 8.39106 8.59131 8.23637L10.6402 4.18088L15.2022 4.43246C15.3765 4.43816 15.5492 4.39338 15.6983 4.30219L19.5036 1.79122L23.3096 4.30219C23.4554 4.40152 23.6306 4.44793 23.8057 4.43246L28.3678 4.18088L30.4174 8.23637C30.4948 8.39106 30.6203 8.51645 30.7751 8.5938L34.8329 10.6423L34.5811 15.2018C34.5746 15.376 34.6202 15.5486 34.7107 15.6976L37.2239 19.5015L34.7115 23.3054Z"/></svg>',
        'certificacao-de-produtos' => '<svg viewBox="0 0 22 33" xmlns="http://www.w3.org/2000/svg"><path d="M11 0C4.9318 0 0 4.89867 0 10.925C0 14.2313 1.48561 17.1969 3.82969 19.2025L3.92996 19.289L3.40133 31.7409C3.40045 31.754 3.40045 31.7662 3.40045 31.7785C3.40045 32.2563 3.68015 32.6922 4.11027 32.8878C4.54566 33.087 5.0347 33.0189 5.40852 32.7L11 27.9158L16.5932 32.7018C16.8254 32.9001 17.1052 32.9988 17.3866 32.9988C17.5564 32.9988 17.727 32.963 17.8906 32.8887C18.3198 32.693 18.5996 32.2572 18.5996 31.7793C18.5996 31.7671 18.5996 31.7575 18.5987 31.7505L18.5793 31.4605H18.5864L18.0701 19.2898L18.1703 19.2033C20.5144 17.1978 22 14.2322 22 10.9259C22.0009 4.89867 17.0682 0 11 0ZM11 1.65793C16.1429 1.65793 20.3314 5.81761 20.3314 10.925C20.3314 16.0325 16.1429 20.1922 11 20.1922C5.85711 20.1922 1.66856 16.0325 1.66856 10.925C1.66856 5.81761 5.85711 1.65793 11 1.65793ZM15.1411 7.5262C14.9273 7.5262 14.7153 7.60569 14.5509 7.76904L9.52583 12.7594L7.085 10.3057C6.75868 9.97729 6.23445 9.97379 5.90461 10.2987C5.57388 10.6228 5.57037 11.1434 5.89757 11.471L8.9286 14.5178C9.08516 14.675 9.29714 14.7641 9.51967 14.7641H9.52231C9.74308 14.7641 9.95594 14.6768 10.1125 14.5213L15.7312 8.9413C16.0593 8.61548 16.0593 8.09486 15.7312 7.76904C15.5668 7.60569 15.3548 7.5262 15.1411 7.5262ZM5.5519 20.4228L5.93451 20.6211C7.45178 21.4064 9.17312 21.8501 11 21.8501C12.826 21.8501 14.5482 21.4055 16.0646 20.6211L16.4472 20.4228L16.8861 30.7634L11.8206 26.4291L11.8163 26.4256C11.3439 25.9879 10.6534 25.9871 10.1811 26.4256L10.1767 26.4291L5.11211 30.7634L5.53255 20.8517L5.5519 20.4228Z" /></svg>',
        'certificacao-de-sistemas' => '<svg viewBox="0 0 25 31" xmlns="http://www.w3.org/2000/svg"><path d="M12.683 0.774414C12.561 0.774414 12.4391 0.802468 12.3264 0.85841L12.3254 0.858949L1.05293 6.39866C0.779315 6.53863 0.61232 6.82028 0.62145 7.12674L0.62182 7.1358V17.4265C0.62182 20.2853 2.46935 23.8399 4.82666 25.4474L4.82684 25.4476L12.2498 30.5223L12.2508 30.5233C12.5273 30.7139 12.8877 30.7139 13.1642 30.5233L13.1652 30.523L20.5655 25.4496L20.5665 25.4489C22.9245 23.8402 24.7679 20.286 24.7679 17.4267V7.15183V7.14312C24.7766 6.83653 24.6089 6.554 24.3348 6.41399L13.0416 0.859148L13.0406 0.858608C12.9279 0.802666 12.8059 0.774612 12.6839 0.774612L12.683 0.774414ZM12.695 2.52125L23.1135 7.676V17.4265C23.1135 19.8624 21.6547 22.7018 19.632 24.081V24.0813L12.6771 28.838L5.74934 24.0818C3.72618 22.7011 2.27554 19.8611 2.27554 17.4265V8.04318V7.66224L12.695 2.52125ZM17.009 12.0267L17.0079 12.0269C16.7976 12.0269 16.5871 12.1089 16.4231 12.2729L11.284 17.4111L8.97083 15.0755C8.64357 14.7453 8.13049 14.7429 7.80047 15.0701C7.47052 15.3972 7.46864 15.9107 7.79542 16.2408L10.6938 19.1688L10.6951 19.17L10.6965 19.171C10.8504 19.3282 11.0599 19.417 11.2801 19.4185C11.5 19.4173 11.7098 19.3294 11.8642 19.1738L11.8653 19.173L17.5925 13.4436V13.4435C17.9214 13.1154 17.9212 12.6012 17.5935 12.2733V12.2729V12.2727C17.4299 12.1087 17.2195 12.0267 17.0092 12.0267L17.009 12.0267Z"/></svg>',
        'certificacao-de-servicos-automotivos' => '<svg viewBox="0 0 36 18" mlns="http://www.w3.org/2000/svg"><path d="M14.3834 6.31102e-05C14.3716 4.84738e-05 14.3597 0.000732684 14.3479 0.00211224C14.3476 0.0021583 14.3472 0.00220592 14.3469 0.00225312C13.0925 0.0129083 11.9065 0.565721 11.1426 1.51424C11.1051 1.56077 11.0844 1.61753 11.0835 1.67612V1.58787L7.85584 5.59898L2.37784 7.0234C2.36179 7.02757 2.34614 7.03305 2.33109 7.03979C0.953072 7.42173 0 8.6269 0 9.99354V11.9869C0 13.6859 1.42726 15.091 3.21726 15.091H3.66696L3.66163 15.0712C4.23237 17.1616 6.48005 18.4156 8.68144 17.874C8.68169 17.8739 8.68193 17.8739 8.68217 17.8738C10.128 17.5147 11.2626 16.4443 11.6334 15.0712L11.6281 15.091H23.9592L23.9539 15.0712C24.5247 17.1616 26.7723 18.4156 28.9737 17.874C28.974 17.8739 28.9742 17.8739 28.9745 17.8738C30.4203 17.5147 31.5549 16.4443 31.9257 15.0711L31.9204 15.091H32.7827C34.5727 15.091 36 13.6859 36 11.9869V9.7139V9.71308C36.007 8.50706 35.2642 7.40691 34.1131 6.90604C34.113 6.90595 34.1129 6.90586 34.1128 6.90576L31.233 5.65717L28.6889 1.80303V1.80289C28.6824 1.79304 28.6752 1.78359 28.6674 1.77461C28.6673 1.77447 28.6672 1.77433 28.667 1.77419C27.9222 0.665628 26.6296 -0.00669646 25.2409 5.03031e-05L14.3834 6.31102e-05ZM14.3834 1.4518H25.2383C25.2391 1.45181 25.2399 1.45181 25.2407 1.4518C26.115 1.44489 26.938 1.86685 27.3969 2.57241C27.3972 2.57291 27.3976 2.57341 27.3979 2.57391L30.063 6.61466L30.0633 6.61508C30.1446 6.74601 30.2579 6.83107 30.3917 6.89089C30.3928 6.89131 30.3938 6.89172 30.3948 6.89212L33.4669 8.22529L33.4633 8.22351C33.4658 8.22469 33.4683 8.22582 33.4709 8.22693C34.0794 8.49523 34.4711 9.07377 34.4638 9.7135C34.4638 9.71446 34.4638 9.71541 34.4638 9.71637V11.7404C34.4638 11.7609 34.4663 11.7814 34.4711 11.8014V11.9868C34.4711 12.8876 33.7314 13.6391 32.7828 13.6391H32.0271L32.0297 13.6627C31.7861 11.5243 29.7613 9.97951 27.5113 10.2035C27.5022 10.2036 27.4931 10.2041 27.4841 10.205C27.484 10.205 27.4839 10.205 27.4838 10.205C25.5635 10.4022 24.0502 11.846 23.8426 13.6625L23.8452 13.6391H11.7347L11.7373 13.6627C11.4936 11.5243 9.46879 9.97943 7.21868 10.2035C7.20965 10.2036 7.20062 10.2041 7.19164 10.205C5.27133 10.4022 3.7581 11.846 3.55043 13.6625L3.55302 13.6391H3.20978C2.26121 13.6391 1.52145 12.8876 1.52145 11.9868V9.99574C1.52146 9.99487 1.52146 9.99401 1.52145 9.99314C1.51421 9.25735 2.02937 8.61665 2.77532 8.41722C2.77552 8.41718 2.77572 8.41713 2.77591 8.41708L2.7765 8.41694L8.51014 6.92818C8.51138 6.92787 8.51263 6.92755 8.51388 6.92722L8.51447 6.92694C8.51498 6.9268 8.51553 6.92666 8.51605 6.92652C8.52095 6.92517 8.5257 6.92331 8.53058 6.92188C8.53028 6.92202 8.52973 6.9223 8.52943 6.92244C8.53059 6.92204 8.53174 6.92162 8.53289 6.92121C8.68385 6.87643 8.823 6.79146 8.91871 6.66561L12.3464 2.39782L12.342 2.40274C12.3449 2.39952 12.3477 2.39624 12.3505 2.3929C12.8386 1.79786 13.5892 1.4518 14.3835 1.4518L14.3834 1.4518ZM8.52939 6.92244C8.52496 6.92391 8.5205 6.92527 8.51601 6.92654C8.50499 6.92962 8.51339 6.92791 8.52939 6.92244ZM7.64394 11.6216C9.07172 11.6216 10.2305 12.7218 10.2308 14.0776C10.2308 14.0781 10.2308 14.0785 10.2308 14.079C10.2377 15.4274 9.07932 16.5275 7.64451 16.5348C7.64429 16.5348 7.64414 16.5348 7.64392 16.5348C6.21598 16.5348 5.05691 15.4341 5.05691 14.0781C5.05691 12.7222 6.21596 11.6216 7.64392 11.6216L7.64394 11.6216ZM27.9361 11.6216H27.9362C29.364 11.6216 30.5228 12.7218 30.5231 14.0776C30.5231 14.0781 30.5231 14.0785 30.5231 14.079C30.53 15.4274 29.3715 16.5276 27.9367 16.5348C27.9364 16.5348 27.9363 16.5348 27.9361 16.5348C26.5081 16.5348 25.3491 15.4341 25.3491 14.0781C25.3491 12.7222 26.5081 11.6216 27.9361 11.6216L27.9361 11.6216Z"/></svg>',
    );

    if ($svg) {
        return $icons;
    }

    return $atuacoes;
}

function page_atuacao($post)
{
    $atuacao_agilidade = get_post_meta($post->ID, 'atuacao_agilidade', true);
    $atuacao_avancados = get_post_meta($post->ID, 'atuacao_avancados', true);
    $atuacao_avancados_atuacao = get_post_meta($post->ID, 'atuacao_avancados_atuacao', true);
    $atuacao_global = get_post_meta($post->ID, 'atuacao_global', true);
    $atuacao_global_atuacao = get_post_meta($post->ID, 'atuacao_global_atuacao', true);
?>
    <table style="width:100%">
        <tr>
            <td>
                <h3>Agilidade dos processos</h3>
                <textarea name="atuacao_agilidade" rows="3" style="width:100%" class="translate"><?php echo $atuacao_agilidade; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Postos Avançados</h3>
                <?php wp_editor($atuacao_avancados, 'atuacao_avancados', array('textarea_name' => 'atuacao_avancados')); ?>
                <br>
                <h4>Nossa atuação</h4>
                <?php
                foreach (nossa_atuacao() as $key => $atuacao) {
                ?>
                    <label for="a_<?php echo $key; ?>" style="margin-right:20px;">
                        <input type="checkbox" id="a_<?php echo $key; ?>" name="atuacao_avancados_atuacao[]" <?php echo is_array($atuacao_avancados_atuacao) && in_array($key, $atuacao_avancados_atuacao) ? ' checked="checked"' : ''; ?> value="<?php echo $key; ?>"> <?php echo $atuacao; ?>
                    </label>
                <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <hr>
                <h3>Postos Global</h3>
                <?php wp_editor($atuacao_global, 'atuacao_global', array('textarea_name' => 'atuacao_global')); ?>
                <br>
                <h4>Nossa atuação</h4>
                <?php
                foreach (nossa_atuacao() as $key => $atuacao) {
                ?>
                    <label for="g_<?php echo $key; ?>" style="margin-right:20px;">
                        <input type="checkbox" id="g_<?php echo $key; ?>" name="atuacao_global_atuacao[]" <?php echo is_array($atuacao_global_atuacao) && in_array($key, $atuacao_global_atuacao) ? ' checked="checked"' : ''; ?> value="<?php echo $key; ?>"> <?php echo $atuacao; ?>
                    </label>
                <?php
                }
                ?>
            </td>
        </tr>
    </table>
<?php
}

function page_diretoria($post)
{
    $diretoria_executiva_texto = get_post_meta($post->ID, 'diretoria_executiva_texto', true);
    $diretoria_executiva_entidades = get_post_meta($post->ID, 'diretoria_executiva_entidades', true);
    $diretoria_executiva_diretores = get_post_meta($post->ID, 'diretoria_executiva_diretores', true);
    $conselho_texto = get_post_meta($post->ID, 'conselho_texto', true);
    $conselho_entidades = get_post_meta($post->ID, 'conselho_entidades', true);
    $conselho_diretores = get_post_meta($post->ID, 'conselho_diretores', true);
    $conselho_fiscal = get_post_meta($post->ID, 'conselho_fiscal', true);
    $conselho_fiscal_suplentes = get_post_meta($post->ID, 'conselho_fiscal_suplentes', true);
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;

            jQuery('.clear_button').on('click', function() {
                jQuery(this).siblings('.imagem').val('');
            });

            jQuery('.upload_button').on('click', function() {
                text = jQuery(this).parent().find('.imagem');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Imagem',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
                fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
                jQuery('input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation, jQuery(this).closest('td'))
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table style="width:100%;">
        <tr>
            <td colspan="2">
                <h3>Diretoria Executiva</h3>
            </td>
        </tr>
        <tr>
            <th>Texto</th>
            <td>
                <textarea name="diretoria_executiva_texto" rows="3" style="width:100%;"><?php echo $diretoria_executiva_texto; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Entidades</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($diretoria_executiva_entidades) {
                        foreach ($diretoria_executiva_entidades as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="text" name="diretoria_executiva_entidades[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <div style="margin-top: 5px">
                                    <input type="text" name="diretoria_executiva_entidades[<?php echo $i; ?>][1]" class="imagem" value="<?php echo $row[1]; ?>" readonly="readonly" />
                                    <input type="button" class="upload_button button" value="Adicionar Imagem" />
                                    <input type="button" class="clear_button button" value="Remove Imagem" />
                                </div>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="text" name="diretoria_executiva_entidades[<?php echo $i; ?>][0]" value="0" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <div style="margin-top: 5px">
                                <input type="text" name="diretoria_executiva_entidades[<?php echo $i; ?>][1]" class="imagem" value="" readonly="readonly" />
                                <input type="button" class="upload_button button" value="Adicionar Imagem" />
                                <input type="button" class="clear_button button" value="Remove Imagem" />
                            </div>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <hr>
            </td>
        </tr>
        <tr>
            <th>Diretores</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($diretoria_executiva_diretores) {
                        foreach ($diretoria_executiva_diretores as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" placeholder="Nome" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <div style="margin-top: 5px">
                                    <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][1]" value="<?php echo $row[1]; ?>" placeholder="Cargo" /><br>
                                </div>
                                <div style="margin-top: 5px">
                                    <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][2]" value="<?php echo $row[2]; ?>" placeholder="Entidade" /> |
                                    <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][3]" value="<?php echo $row[3]; ?>" placeholder="Empresa" /><br>
                                </div>
                                <div style="margin-top: 5px">
                                    <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][4]" class="imagem" value="<?php echo $row[4]; ?>" readonly="readonly" />
                                    <input type="button" class="upload_button button" value="Adicionar Foto" />
                                    <input type="button" class="clear_button button" value="Remove Foto" />
                                </div>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][0]" value="" placeholder="Nome" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <div style="margin-top: 5px">
                                <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][1]" value="" placeholder="Cargo" /><br>
                            </div>
                            <div style="margin-top: 5px">
                                <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][2]" value="" placeholder="Entidade" /> |
                                <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][3]" value="" placeholder="Empresa" /><br>
                            </div>
                            <div style="margin-top: 5px">
                                <input type="text" name="diretoria_executiva_diretores[<?php echo $i; ?>][4]" class="imagem" value="" readonly="readonly" />
                                <input type="button" class="upload_button button" value="Adicionar Foto" />
                                <input type="button" class="clear_button button" value="Remove Foto" />
                            </div>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Conselho Diretor</h3>
            </td>
        </tr>
        <tr>
            <th>Texto</th>
            <td>
                <textarea name="conselho_texto" rows="3" style="width:100%;"><?php echo $conselho_texto; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Entidades</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($conselho_entidades) {
                        foreach ($conselho_entidades as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="text" name="conselho_entidades[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <div style="margin-top: 5px">
                                    <input type="text" name="conselho_entidades[<?php echo $i; ?>][1]" class="imagem" value="<?php echo $row[1]; ?>" readonly="readonly" />
                                    <input type="button" class="upload_button button" value="Adicionar Imagem" />
                                    <input type="button" class="clear_button button" value="Remove Imagem" />
                                </div>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="text" name="conselho_entidades[<?php echo $i; ?>][0]" value="0" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <div style="margin-top: 5px">
                                <input type="text" name="conselho_entidades[<?php echo $i; ?>][1]" class="imagem" value="" readonly="readonly" />
                                <input type="button" class="upload_button button" value="Adicionar Imagem" />
                                <input type="button" class="clear_button button" value="Remove Imagem" />
                            </div>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <hr>
            </td>
        </tr>
        <tr>
            <th>Diretores</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($conselho_diretores) {
                        foreach ($conselho_diretores as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="text" name="conselho_diretores[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" placeholder="Nome" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <div style="margin-top: 5px">
                                    <input type="text" name="conselho_diretores[<?php echo $i; ?>][1]" value="<?php echo $row[1]; ?>" placeholder="Entidade" /><br>
                                </div>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="text" name="conselho_diretores[<?php echo $i; ?>][0]" value="" placeholder="Nome" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <div style="margin-top: 5px">
                                <input type="text" name="conselho_diretores[<?php echo $i; ?>][1]" value="" placeholder="Entidade" /><br>
                            </div>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Conselho Fiscal - Titulares</h3>
            </td>
        </tr>
        <tr>
            <th>Diretores</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($conselho_fiscal) {
                        foreach ($conselho_fiscal as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="text" name="conselho_fiscal[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" placeholder="Nome" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <div style="margin-top: 5px">
                                    <input type="text" name="conselho_fiscal[<?php echo $i; ?>][1]" value="<?php echo $row[1]; ?>" placeholder="Entidade" /><br>
                                </div>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="text" name="conselho_fiscal[<?php echo $i; ?>][0]" value="" placeholder="Nome" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <div style="margin-top: 5px">
                                <input type="text" name="conselho_fiscal[<?php echo $i; ?>][1]" value="" placeholder="Entidade" /><br>
                            </div>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Conselho Fiscal - Suplentes</h3>
            </td>
        </tr>
        <tr>
            <th>Diretores</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($conselho_fiscal_suplentes) {
                        foreach ($conselho_fiscal_suplentes as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="text" name="conselho_fiscal_suplentes[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" placeholder="Nome" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <div style="margin-top: 5px">
                                    <input type="text" name="conselho_fiscal_suplentes[<?php echo $i; ?>][1]" value="<?php echo $row[1]; ?>" placeholder="Entidade" /><br>
                                </div>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="text" name="conselho_fiscal_suplentes[<?php echo $i; ?>][0]" value="" placeholder="Nome" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <div style="margin-top: 5px">
                                <input type="text" name="conselho_fiscal_suplentes[<?php echo $i; ?>][1]" value="" placeholder="Entidade" /><br>
                            </div>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
    </table>
<?php
}

function page_compliance($post)
{
    $compliance_downloads = get_post_meta($post->ID, 'compliance_downloads', true);
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_arquivo_button').on('click', function() {
                jQuery(this).siblings('.compliance_downloads').val('');
                jQuery(this).siblings('.downloads_compliance_texto').val('');
            });

            jQuery('.upload_arquivo_button').on('click', function() {
                id = jQuery(this).parent().find('.compliance_downloads');
                text = jQuery(this).parent().find('.downloads_compliance_texto');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
                fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
                jQuery('input[type="hidden"], input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation, jQuery(this).closest('td'))
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table>
        <tr>
            <th>Downloads</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($compliance_downloads) {
                        foreach ($compliance_downloads as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <input type="hidden" name="compliance_downloads[<?php echo $i; ?>]" class="compliance_downloads" value="<?php echo $row; ?>" />
                                <input type="text" name="downloads_compliance_texto" class="downloads_compliance_texto" value="<?php echo wp_get_attachment_url($row); ?>" readonly="readonly" />
                                <input type="button" class="upload_arquivo_button button" value="Adicionar Arquivo" />
                                <input type="button" class="clear_arquivo_button button" value="Remove Arquivo" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>
                            <input type="hidden" name="compliance_downloads[<?php echo $i; ?>]" class="compliance_downloads" value="" />
                            <input type="text" name="downloads_compliance_texto" class="downloads_compliance_texto" value="" readonly="readonly" />
                            <input type="button" class="upload_arquivo_button button" value="Adicionar Arquivo" />
                            <input type="button" class="clear_arquivo_button button" value="Remove Arquivo" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
            </td>
        </tr>
    </table>
<?php
}

function page_comissao_tecnica($post)
{
    $comissao_titulo = get_post_meta($post->ID, 'comissao_titulo', true);
    $comissao_texto = get_post_meta($post->ID, 'comissao_texto', true);
    $comissao_imagem_azul = get_post_meta($post->ID, 'comissao_imagem_azul', true);
    $comissao_titulo_azul = get_post_meta($post->ID, 'comissao_titulo_azul', true);
    $comissao_texto_azul = get_post_meta($post->ID, 'comissao_texto_azul', true);
    $comissao_opcoes = get_post_meta($post->ID, 'comissao_opcoes', true);
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_arquivo_button').on('click', function() {
                jQuery(this).siblings('.comissao_imagem_azul').val('');
                jQuery(this).siblings('.comissao_imagem_azul_url').val('');
            });

            jQuery('.upload_arquivo_button').on('click', function() {
                id = jQuery(this).parent().find('.comissao_imagem_azul');
                text = jQuery(this).parent().find('.comissao_imagem_azul_url');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
                fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
                jQuery('input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation, jQuery(this).closest('td'))
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table style="width:100%">
        <tr>
            <th>Título</th>
            <td>
                <input type="text" name="comissao_titulo" class="translate" value="<?php echo $comissao_titulo; ?>" placeholder="Título">
            </td>
        </tr>
        <tr>
            <th>Texto</th>
            <td>
                <?php wp_editor($comissao_texto, 'comissao_texto', array('textarea_name' => 'comissao_texto')); ?>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <h3>Parte azul</h3>
            </th>
        </tr>
        <tr>
            <th>Imagem</th>
            <td>
                <input type="hidden" name="comissao_imagem_azul" class="comissao_imagem_azul" value="<?php echo $comissao_imagem_azul; ?>" />
                <input type="text" name="comissao_imagem_azul_url" class="comissao_imagem_azul_url" value="<?php echo wp_get_attachment_url($comissao_imagem_azul); ?>" readonly="readonly" />
                <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
            </td>
        </tr>
        <tr>
            <th>Título</th>
            <td>
                <input type="text" name="comissao_titulo_azul" class="translate" value="<?php echo $comissao_titulo_azul; ?>" placeholder="Título">
            </td>
        </tr>
        <tr>
            <th>Texto</th>
            <td>
                <?php wp_editor($comissao_texto_azul, 'comissao_texto_azul', array('textarea_name' => 'comissao_texto_azul')); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Faça mais em um único lugar</h3>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($comissao_opcoes) {
                        foreach ($comissao_opcoes as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <input type="text" name="comissao_opcoes[<?php echo $i; ?>][0]" class="translate" value="<?php echo $row[0]; ?>" placeholder="Título">
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <textarea name="comissao_opcoes[<?php echo $i; ?>][1]" class="translate" rows="3" style="width:100%;"><?php echo $row[1]; ?></textarea>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span><br>
                            <input type="text" name="comissao_opcoes[<?php echo $i; ?>][0]" class="translate" value="" placeholder="Título">
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <textarea name="comissao_opcoes[<?php echo $i; ?>][1]" class="translate" rows="3" style="width:100%;"></textarea>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <hr>
            </td>
        </tr>
    </table>
<?php
}

function page_treinamentos($post)
{
    $treinamentos_topo_imagem = get_post_meta($post->ID, 'treinamentos_topo_imagem', true);
    $treinamentos_topo_titulo = get_post_meta($post->ID, 'treinamentos_topo_titulo', true);
    $treinamentos_topo_texto = get_post_meta($post->ID, 'treinamentos_topo_texto', true);
    $treinamentos_topo_texto_cor = get_post_meta($post->ID, 'treinamentos_topo_texto_cor', true);
    $treinamentos_topo_link = get_post_meta($post->ID, 'treinamentos_topo_link', true);
    $treinamentos_topo_link_texto = get_post_meta($post->ID, 'treinamentos_topo_link_texto', true);
    $treinamentos_promocao = get_post_meta($post->ID, 'treinamentos_promocao', true);
    $treinamentos_promocao_de = get_post_meta($post->ID, 'treinamentos_promocao_de', true);
    $treinamentos_promocao_por = get_post_meta($post->ID, 'treinamentos_promocao_por', true);

?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_arquivo_button').on('click', function() {
                jQuery(this).siblings('.treinamentos_topo_imagem').val('');
                jQuery(this).siblings('.treinamentos_topo_imagem_url').val('');
            });

            jQuery('.upload_arquivo_button').on('click', function() {
                id = jQuery(this).parent().find('.treinamentos_topo_imagem');
                text = jQuery(this).parent().find('.treinamentos_topo_imagem_url');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });
        });
    </script>
    <table style="width:100%;">
        <tr>
            <th>Imagem Topo</th>
            <td>
                <input type="hidden" name="treinamentos_topo_imagem" class="treinamentos_topo_imagem" value="<?php echo $treinamentos_topo_imagem; ?>" />
                <input type="text" name="treinamentos_topo_imagem_url" class="treinamentos_topo_imagem_url" value="<?php echo wp_get_attachment_url($treinamentos_topo_imagem); ?>" readonly="readonly" />
                <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
            </td>
        </tr>
        <tr>
            <th>Título</th>
            <td>
                <input type="text" name="treinamentos_topo_titulo" class="translate" value="<?php echo $treinamentos_topo_titulo; ?>" placeholder="Título">
            </td>
        </tr>
        <tr>
            <th>Cor do texto</th>
            <td>
                <input type="color" name="treinamentos_topo_texto_cor" value="<?php echo $treinamentos_topo_texto_cor ? $treinamentos_topo_texto_cor : '#FFFFFF'; ?>">
            </td>
        </tr>
        <tr>
            <th>Texto</th>
            <td>
                <textarea name="treinamentos_topo_texto" id="treinamentos_topo_texto" class="translate" rows="3" style="width:100%;" placeholder="Texto"><?php echo $treinamentos_topo_texto; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Link</th>
            <td>
                <input type="text" name="treinamentos_topo_link_texto" value="<?php echo $treinamentos_topo_link_texto ? $treinamentos_topo_link_texto : 'Inscreva-se'; ?>" placeholder="Texto do link"><br>
                <input type="text" name="treinamentos_topo_link" value="<?php echo $treinamentos_topo_link; ?>" placeholder="Link">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Promoção relâmpago</h3>
            </td>
        </tr>
        <tr>
            <th>Treinamento</th>
            <td>
                <select name="treinamentos_promocao">
                    <option value="">Selecione</option>
                    <?php
                    $treinamentos = get_posts(array(
                        'post_type' => 'treinamento',
                        'showposts' => -1,
                        'orderby' => 'title',
                        'order' => 'asc'
                    ));

                    foreach ($treinamentos as $t) {
                    ?>
                        <option value="<?php echo $t->ID; ?>" <?php echo $treinamentos_promocao == $t->ID ? ' selected="selected"' : ''; ?>><?php echo apply_filters('the_title', $t->post_title); ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>De:</th>
            <td><input type="text" name="treinamentos_promocao_de" class="translate" value="<?php echo $treinamentos_promocao_de; ?>"></td>
        </tr>
        <tr>
            <th>Por:</th>
            <td><input type="text" name="treinamentos_promocao_por" class="translate" value="<?php echo $treinamentos_promocao_por; ?>"></td>
        </tr>
    </table>
<?php
}

function page_cb005($post)
{
    $cb005_superintendente = get_post_meta($post->ID, 'cb005_superintendente', true);
    $cb005_secretaria_tecnica = get_post_meta($post->ID, 'cb005_secretaria_tecnica', true);
    $cb005_chefe_secretaria = get_post_meta($post->ID, 'cb005_chefe_secretaria', true);
    $cb005_secretaria = get_post_meta($post->ID, 'cb005_secretaria', true);
    $cb005_endereco = get_post_meta($post->ID, 'cb005_endereco', true);
    $cb005_fone = get_post_meta($post->ID, 'cb005_fone', true);
    $cb005_fone_ramal = get_post_meta($post->ID, 'cb005_fone_ramal', true);
    $cb005_email = get_post_meta($post->ID, 'cb005_email', true);
    $cbooc_links = get_post_meta($post->ID, 'cbooc_links', true);
?>
    <script>
        jQuery(function() {
            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
                fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
                jQuery('input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation, jQuery(this).closest('td'))
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table style="width:100%">
        <tr>
            <th>Superintendente</th>
            <td>
                <input type="text" name="cb005_superintendente" class="translate" value="<?php echo $cb005_superintendente; ?>">
            </td>
        </tr>
        <tr>
            <th>Secretaría Técnica</th>
            <td>
                <input type="text" name="cb005_secretaria_tecnica" class="translate" value="<?php echo $cb005_secretaria_tecnica; ?>">
            </td>
        </tr>
        <tr>
            <th>Chefe de Secretaría</th>
            <td>
                <input type="text" name="cb005_chefe_secretaria" class="translate" value="<?php echo $cb005_chefe_secretaria; ?>">
            </td>
        </tr>
        <tr>
            <th>Secretária</th>
            <td>
                <input type="text" name="cb005_secretaria" class="translate" value="<?php echo $cb005_secretaria; ?>">
            </td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td>
                <input type="text" name="cb005_endereco" class="translate" value="<?php echo $cb005_endereco; ?>">
            </td>
        </tr>
        <tr>
            <th>Telefone/Ramal</th>
            <td>
                <input type="text" name="cb005_fone" class="translate" value="<?php echo $cb005_fone; ?>"> /
                <input type="text" name="cb005_fone_ramal" class="translate" value="<?php echo $cb005_fone_ramal; ?>">
            </td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td>
                <input type="text" name="cb005_email" class="translate" value="<?php echo $cb005_email; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Links</h3>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($cbooc_links) {
                        foreach ($cbooc_links as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <input type="text" name="cbooc_links[<?php echo $i; ?>][0]" class="translate" value="<?php echo $row[0]; ?>" placeholder="Título">
                                <input type="text" name="cbooc_links[<?php echo $i; ?>][1]" class="translate" value="<?php echo $row[1]; ?>" placeholder="Link">
                                <a class="repeatable-remove button" href="#">Excluir</a>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span><br>
                            <input type="text" name="cbooc_links[<?php echo $i; ?>][0]" class="translate" value="" placeholder="Título">
                            <input type="text" name="cbooc_links[<?php echo $i; ?>][1]" class="translate" value="" placeholder="Link">
                            <a class="repeatable-remove button" href="#">Excluir</a>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <hr>
            </td>
        </tr>
    </table>
<?php
}

function page_vencedores_premio($post)
{
    $premio_ranking = get_post_meta($post->ID, 'premio_ranking', true);
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_arquivo_button').on('click', function() {
                jQuery(this).siblings('.premio_imagem').val('');
                jQuery(this).siblings('.premio_imagem_url').val('');
            });

            jQuery('.upload_arquivo_button').on('click', function() {
                id = jQuery(this).parent().find('.premio_imagem');
                text = jQuery(this).parent().find('.premio_imagem_url');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
                fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
                jQuery('input[type="text"], input[type="color"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation, jQuery(this).closest('td'))
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table style="width:100%">
        <tr>
            <td colspan="2">
                <h3>Vencedores</h3>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($premio_ranking) {
                        foreach ($premio_ranking as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <input type="text" name="premio_ranking[<?php echo $i; ?>][0]" class="translate" value="<?php echo $row[0]; ?>" placeholder="Posição">
                                <input type="text" name="premio_ranking[<?php echo $i; ?>][1]" class="translate" value="<?php echo $row[1]; ?>" placeholder="Objetivo">
                                <input type="text" name="premio_ranking[<?php echo $i; ?>][2]" class="translate" value="<?php echo $row[2]; ?>" placeholder="Categoria">
                                <div>
                                    <input type="hidden" name="premio_ranking[<?php echo $i; ?>][3]" class="premio_imagem" value="<?php echo $row[3]; ?>" />
                                    <input type="text" name="premio_imagem_url" class="premio_imagem_url" value="<?php echo wp_get_attachment_url($row[3]); ?>" readonly="readonly" />
                                    <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                                    <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
                                </div>
                                <input type="text" name="premio_ranking[<?php echo $i; ?>][4]" class="translate" value="<?php echo $row[4]; ?>" placeholder="Título">
                                <input type="text" name="premio_ranking[<?php echo $i; ?>][5]" class="translate" value="<?php echo $row[5]; ?>" placeholder="Nome do projeto">
                                <input type="text" name="premio_ranking[<?php echo $i; ?>][6]" class="translate" value="<?php echo $row[6]; ?>" placeholder="Descrição">
                                <textarea name="premio_ranking[<?php echo $i; ?>][7]" class="translate" rows="3" style="width:100%;" placeholder="Detalhes"><?php echo $row[7]; ?></textarea>
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span><br>
                            <input type="text" name="premio_ranking[<?php echo $i; ?>][0]" class="translate" value="" placeholder="Posição">
                            <input type="text" name="premio_ranking[<?php echo $i; ?>][1]" class="translate" value="" placeholder="Objetivo">
                            <input type="text" name="premio_ranking[<?php echo $i; ?>][2]" class="translate" value="" placeholder="Categoria">
                            <div>
                                <input type="hidden" name="premio_ranking[<?php echo $i; ?>][3]" class="premio_imagem" value="" />
                                <input type="text" name="premio_imagem_url" class="premio_imagem_url" value="" readonly="readonly" />
                                <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                                <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
                            </div>
                            <input type="text" name="premio_ranking[<?php echo $i; ?>][4]" class="translate" value="" placeholder="Título">
                            <input type="text" name="premio_ranking[<?php echo $i; ?>][5]" class="translate" value="" placeholder="Nome do projeto">
                            <input type="text" name="premio_ranking[<?php echo $i; ?>][6]" class="translate" value="" placeholder="Descrição">
                            <textarea name="premio_ranking[<?php echo $i; ?>][7]" class="translate" rows="3" style="width:100%;" placeholder="Detalhes"></textarea>
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <hr>
            </td>
        </tr>
    </table>
<?php
}
function page_certificacao_profissionais($post)
{
    $certificacao_videos = get_post_meta($post->ID, 'certificacao_videos', true);
    $certificacao_apoiadores = get_post_meta($post->ID, 'certificacao_apoiadores', true);
    $certificacao_azul_titulo = get_post_meta($post->ID, 'certificacao_azul_titulo', true);
    $certificacao_azul_texto = get_post_meta($post->ID, 'certificacao_azul_texto', true);
    $certificacao_azul_link = get_post_meta($post->ID, 'certificacao_azul_link', true);
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_arquivo_button').on('click', function() {
                jQuery(this).siblings('.certificacao_imagem').val('');
                jQuery(this).siblings('.certificacao_imagem_url').val('');
            });

            jQuery('.upload_arquivo_button').on('click', function() {
                id = jQuery(this).parent().find('.certificacao_imagem');
                text = jQuery(this).parent().find('.certificacao_imagem_url');

                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Arquivo',
                    multiple: false
                });

                file_frame.on('select', function() {
                    attachment = file_frame.state().get('selection').first().toJSON();
                    id.val(attachment.id);
                    text.val(attachment.url);
                });

                file_frame.open();
            });

            jQuery('.repeatable-add').click(function() {
                field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
                fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
                jQuery('input[type="text"], input[type="color"], input[type="hidden"], textarea', field).val('').attr('name', function(index, name) {
                    return name.replace(/(\d+)/, function(fullMatch, n) {
                        return Number(n) + 1;
                    });
                })
                field.insertAfter(fieldLocation, jQuery(this).closest('td'))
                return false;
            });

            jQuery('.repeatable-remove').click(function() {
                if (jQuery(this).parent().siblings().length > 0)
                    jQuery(this).parent().remove();
                return false;
            });

            jQuery('.custom_repeatable').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table style="width:100%">
        <tr>
            <td colspan="2">
                <h3>Video-depoimentos</h3>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($certificacao_videos) {
                        foreach ($certificacao_videos as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <div>
                                    <input type="hidden" name="certificacao_videos[<?php echo $i; ?>][0]" class="certificacao_imagem" value="<?php echo $row[0]; ?>" />
                                    <input type="text" name="certificacao_imagem_url" class="certificacao_imagem_url" value="<?php echo wp_get_attachment_url($row[0]); ?>" readonly="readonly" />
                                    <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                                    <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
                                </div>
                                <input type="text" name="certificacao_videos[<?php echo $i; ?>][1]" class="translate" value="<?php echo $row[1]; ?>" placeholder="Título">
                                <input type="text" name="certificacao_videos[<?php echo $i; ?>][2]" value="<?php echo $row[2]; ?>" placeholder="Link">
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span><br>
                            <div>
                                <input type="hidden" name="certificacao_videos[<?php echo $i; ?>][0]" class="certificacao_imagem" value="" />
                                <input type="text" name="certificacao_imagem_url" class="certificacao_imagem_url" value="" readonly="readonly" />
                                <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                                <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
                            </div>
                            <input type="text" name="certificacao_videos[<?php echo $i; ?>][1]" class="translate" value="" placeholder="Título">
                            <input type="text" name="certificacao_videos[<?php echo $i; ?>][2]" value="" placeholder="Link">
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Apoiadores do projeto</h3>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($certificacao_apoiadores) {
                        foreach ($certificacao_apoiadores as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <div>
                                    Logo: <input type="hidden" name="certificacao_apoiadores[<?php echo $i; ?>][0]" class="certificacao_imagem" value="<?php echo $row[0]; ?>" />
                                    <input type="text" name="certificacao_imagem_url" class="certificacao_imagem_url" value="<?php echo wp_get_attachment_url($row[0]); ?>" readonly="readonly" />
                                    <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                                    <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
                                </div>
                                <input type="text" name="certificacao_apoiadores[<?php echo $i; ?>][1]" class="translate" value="<?php echo $row[1]; ?>" placeholder="Empresa">
                                <input type="text" name="certificacao_apoiadores[<?php echo $i; ?>][2]" class="translate" value="<?php echo $row[2]; ?>" placeholder="Cidade - Estado">
                                <div>
                                    Foto: <input type="hidden" name="certificacao_apoiadores[<?php echo $i; ?>][3]" class="certificacao_imagem" value="<?php echo $row[3]; ?>" />
                                    <input type="text" name="certificacao_imagem_url" class="certificacao_imagem_url" value="<?php echo wp_get_attachment_url($row[3]); ?>" readonly="readonly" />
                                    <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                                    <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
                                </div>
                                <input type="text" name="certificacao_apoiadores[<?php echo $i; ?>][4]" class="translate" value="<?php echo $row[4]; ?>" placeholder="Nome">
                                <textarea name="certificacao_apoiadores[<?php echo $i; ?>][5]" class="translate" rows="3" style="width:100%;" placeholder="Depoimento"><?php echo $row[5]; ?></textarea>
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <hr>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span><br>
                            <div>
                                Logo: <input type="hidden" name="certificacao_apoiadores[<?php echo $i; ?>][0]" class="certificacao_imagem" value="" />
                                <input type="text" name="certificacao_imagem_url" class="certificacao_imagem_url" value="" readonly="readonly" />
                                <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                                <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
                            </div>
                            <input type="text" name="certificacao_apoiadores[<?php echo $i; ?>][1]" class="translate" value="" placeholder="Empresa">
                            <input type="text" name="certificacao_apoiadores[<?php echo $i; ?>][2]" class="translate" value="" placeholder="Cidade - Estado">
                            <div>
                                Foto: <input type="hidden" name="certificacao_apoiadores[<?php echo $i; ?>][3]" class="certificacao_imagem" value="" />
                                <input type="text" name="certificacao_imagem_url" class="certificacao_imagem_url" value="" readonly="readonly" />
                                <input type="button" class="upload_arquivo_button button" value="Adicionar imagem" />
                                <input type="button" class="clear_arquivo_button button" value="Remove imagem" />
                            </div>
                            <input type="text" name="certificacao_apoiadores[<?php echo $i; ?>][4]" class="translate" value="" placeholder="Nome">
                            <textarea name="certificacao_apoiadores[<?php echo $i; ?>][5]" class="translate" rows="3" style="width:100%;" placeholder="Depoimento"></textarea>
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>Bloco azul</h3>
            </td>
        </tr>
        <th>Título</th>
        <td>
            <input type="text" name="certificacao_azul_titulo" class="translate" value="<?php echo $certificacao_azul_titulo; ?>">
        </td>
        </tr>
        <tr>
            <th>Texto</th>
            <td>
                <textarea name="certificacao_azul_texto" style="width:100%" rows="5" class="translate"><?php echo $certificacao_azul_texto; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Link</th>
            <td>
                <input type="text" name="certificacao_azul_link" class="translate" value="<?php echo $certificacao_azul_link; ?>">
            </td>
        </tr>
    </table>
<?php
}

function metabox_pagina()
{
    global $post;


    if ($post->post_name == 'quem-somos') {
        add_meta_box('page_quemsomos', 'Página Quem Somos', 'page_quemsomos', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'produtos-e-servicos') {
        add_meta_box('page_produtoseservicos', 'Página Produtos e Serviços', 'page_produtoseservicos', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'segmentos-e-setores') {
        add_meta_box('page_segmentos', 'Página Segmentos & Setores', 'page_segmentos', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'parcerias') {
        add_meta_box('page_parcerias', 'Página Parcerias', 'page_parcerias', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'imprensa') {
        add_meta_box('page_imprensa', 'Página imprensa', 'page_imprensa', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'atuacao') {
        add_meta_box('page_atuacao', 'Página atuação', 'page_atuacao', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'diretoria-e-conselho') {
        add_meta_box('page_diretoria', 'Página Diretoria e Conselho', 'page_diretoria', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'compliance') {
        add_meta_box('page_compliance', 'Página Compliance', 'page_compliance', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'comissao-tecnica-da-qualidade') {
        add_meta_box('page_comissao_tecnica', 'Página Comissão Técnica', 'page_comissao_tecnica', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'treinamentos') {
        add_meta_box('page_treinamentos', 'Página Treinamentos', 'page_treinamentos', array('page'), 'normal', 'high');
    }

    if ($post->post_name == 'cb005') {
        add_meta_box('page_cb005', 'Página CB005', 'page_cb005', array('page'), 'normal', 'high');
    }

    if (get_post_meta($post->ID, '_wp_page_template', true) == 'page-vencedores-premio.php') {
        add_meta_box('page_vencedores_premio', 'Página vencedores prêmio', 'page_vencedores_premio', array('page'), 'normal', 'high');
    }

    if (get_post_meta($post->ID, '_wp_page_template', true) == 'page-certificacao-profissionais.php') {
        add_meta_box('page_certificacao_profissionais', 'Página certificação profissionais', 'page_certificacao_profissionais', array('page'), 'normal', 'high');
    }
}

add_action('add_meta_boxes', 'metabox_pagina');

function save_pagina()
{
    global $typenow;
    global $post;


    if ($typenow == 'page') {
        if ($post->post_name == 'quem-somos') {
            update_post_meta($post->ID, 'quemsomos_sobre_mrcla', stripslashes($_POST['quemsomos_sobre_mrcla']));
            update_post_meta($post->ID, 'quemsomos_missao', stripslashes($_POST['quemsomos_missao']));
            update_post_meta($post->ID, 'quemsomos_visao', stripslashes($_POST['quemsomos_visao']));
            update_post_meta($post->ID, 'quemsomos_valores', stripslashes($_POST['quemsomos_valores']));
            update_post_meta($post->ID, 'quemsomos_equipe', $_POST['quemsomos_equipe']);
            update_post_meta($post->ID, 'quemsomos_foto', $_POST['quemsomos_foto']);
            update_post_meta($post->ID, 'quemsomos_downloads', $_POST['quemsomos_downloads']);
        }

        if ($post->post_name == 'produtos-e-servicos') {
            update_post_meta($post->ID, 'produtoseservicos_swiper', $_POST['produtoseservicos_swiper']);
            update_post_meta($post->ID, 'produtoseservicos_oque_fazemos', $_POST['produtoseserv']);
            update_post_meta($post->ID, 'produtoseservicos_produtos_servicos', $_POST['produtoseservicos']);
        }
        if ($post->post_name == 'segmentos-e-setores') {
            update_post_meta($post->ID, 'segmentos_swiper', $_POST['segmentos_swiper']);
        }

        if ($post->post_name == 'parcerias') {
            update_post_meta($post->ID, 'parcerias', $_POST['parcerias']);
        }

        if ($post->post_name == 'imprensa') {
            update_post_meta($post->ID, 'imprensa_downloads', $_POST['imprensa_downloads']);
        }

        if ($post->post_name == 'atuacao') {
            update_post_meta($post->ID, 'atuacao_agilidade', stripslashes($_POST['atuacao_agilidade']));
            update_post_meta($post->ID, 'atuacao_avancados', stripslashes($_POST['atuacao_avancados']));
            update_post_meta($post->ID, 'atuacao_avancados_atuacao', $_POST['atuacao_avancados_atuacao']);
            update_post_meta($post->ID, 'atuacao_global', stripslashes($_POST['atuacao_global']));
            update_post_meta($post->ID, 'atuacao_global_atuacao', $_POST['atuacao_global_atuacao']);
        }

        if ($post->post_name == 'diretoria-e-conselho') {
            update_post_meta($post->ID, 'diretoria_executiva_texto', stripslashes($_POST['diretoria_executiva_texto']));
            update_post_meta($post->ID, 'diretoria_executiva_entidades', $_POST['diretoria_executiva_entidades']);
            update_post_meta($post->ID, 'diretoria_executiva_diretores', $_POST['diretoria_executiva_diretores']);
            update_post_meta($post->ID, 'conselho_texto', $_POST['conselho_texto']);
            update_post_meta($post->ID, 'conselho_entidades', $_POST['conselho_entidades']);
            update_post_meta($post->ID, 'conselho_diretores', $_POST['conselho_diretores']);
            update_post_meta($post->ID, 'conselho_fiscal', $_POST['conselho_fiscal']);
            update_post_meta($post->ID, 'conselho_fiscal_suplentes', $_POST['conselho_fiscal_suplentes']);
        }

        if ($post->post_name == 'compliance') {
            update_post_meta($post->ID, 'compliance_downloads', $_POST['compliance_downloads']);
        }

        if ($post->post_name == 'comissao-tecnica-da-qualidade') {
            update_post_meta($post->ID, 'comissao_titulo', $_POST['comissao_titulo']);
            update_post_meta($post->ID, 'comissao_texto', $_POST['comissao_texto']);
            update_post_meta($post->ID, 'comissao_imagem_azul', $_POST['comissao_imagem_azul']);
            update_post_meta($post->ID, 'comissao_titulo_azul', $_POST['comissao_titulo_azul']);
            update_post_meta($post->ID, 'comissao_texto_azul', $_POST['comissao_texto_azul']);
            update_post_meta($post->ID, 'comissao_opcoes', $_POST['comissao_opcoes']);
        }

        if ($post->post_name == 'treinamentos') {
            update_post_meta($post->ID, 'treinamentos_topo_imagem', $_POST['treinamentos_topo_imagem']);
            update_post_meta($post->ID, 'treinamentos_topo_titulo', $_POST['treinamentos_topo_titulo']);
            update_post_meta($post->ID, 'treinamentos_topo_texto', $_POST['treinamentos_topo_texto']);
            update_post_meta($post->ID, 'treinamentos_topo_texto_cor', $_POST['treinamentos_topo_texto_cor']);
            update_post_meta($post->ID, 'treinamentos_topo_link', $_POST['treinamentos_topo_link']);
            update_post_meta($post->ID, 'treinamentos_topo_link_texto', $_POST['treinamentos_topo_link_texto']);
            update_post_meta($post->ID, 'treinamentos_promocao', $_POST['treinamentos_promocao']);
            update_post_meta($post->ID, 'treinamentos_promocao_de', $_POST['treinamentos_promocao_de']);
            update_post_meta($post->ID, 'treinamentos_promocao_por', $_POST['treinamentos_promocao_por']);
        }

        if ($post->post_name == 'cb005') {
            update_post_meta($post->ID, 'cb005_superintendente', $_POST['cb005_superintendente']);
            update_post_meta($post->ID, 'cb005_secretaria_tecnica', $_POST['cb005_secretaria_tecnica']);
            update_post_meta($post->ID, 'cb005_chefe_secretaria', $_POST['cb005_chefe_secretaria']);
            update_post_meta($post->ID, 'cb005_secretaria', $_POST['cb005_secretaria']);
            update_post_meta($post->ID, 'cb005_endereco', $_POST['cb005_endereco']);
            update_post_meta($post->ID, 'cb005_fone', $_POST['cb005_fone']);
            update_post_meta($post->ID, 'cb005_fone_ramal', $_POST['cb005_fone_ramal']);
            update_post_meta($post->ID, 'cb005_email', $_POST['cb005_email']);
            update_post_meta($post->ID, 'cbooc_links', $_POST['cbooc_links']);
        }

        if (get_post_meta($post->ID, '_wp_page_template', true) == 'page-vencedores-premio.php') {
            update_post_meta($post->ID, 'premio_ranking', $_POST['premio_ranking']);
        }

        if (get_post_meta($post->ID, '_wp_page_template', true) == 'page-certificacao-profissionais.php') {
            update_post_meta($post->ID, 'certificacao_videos', $_POST['certificacao_videos']);
            update_post_meta($post->ID, 'certificacao_apoiadores', $_POST['certificacao_apoiadores']);
            update_post_meta($post->ID, 'certificacao_azul_titulo', $_POST['certificacao_azul_titulo']);
            update_post_meta($post->ID, 'certificacao_azul_texto', $_POST['certificacao_azul_texto']);
            update_post_meta($post->ID, 'certificacao_azul_link', $_POST['certificacao_azul_link']);
        }
    }
}

add_action('save_post', 'save_pagina', 100);
