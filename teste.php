<?php function page_quemsomos($post) {
    $historico_texto = get_post_meta($post->ID, 'quemsomos_historico_texto', true);
    $historico = get_post_meta($post->ID, 'quemsomos_historico', true);
    $downloads = get_post_meta($post->ID, 'quemsomos_downloads', true);
    ?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_button').on('click', function() {
                jQuery(this).siblings('.downloads').val('');
                jQuery(this).siblings('.downloads_texto').val('');
            });

            jQuery('.upload_button').on('click', function() {
                id = jQuery(this).parent().find('.downloads');
                text = jQuery(this).parent().find('.downloads_texto');

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
            <th>Texto Histórico</th>
            <td>
                <textarea name="quemsomos_historico_texto" class="translate" rows="3" style="width:100%;"><?php echo $historico_texto; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Histórico</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($historico) {
                        foreach ($historico as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span><br>
                                <input type="text" name="quemsomos_historico[<?php echo $i; ?>][0]" value="<?php echo $row[0]; ?>" placeholder="Ano" />
                                <a class="repeatable-remove button" href="#">Excluir</a><br><br>
                                <textarea name="quemsomos_historico[<?php echo $i; ?>][1]" class="translate" rows="3" style="width:100%;"><?php echo $row[1]; ?></textarea>
                            </li>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span><br>
                            <input type="text" name="quemsomos_historico[<?php echo $i; ?>][0]" placeholder="Ano" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br><br>
                            <textarea name="quemsomos_historico[<?php echo $i; ?>][1]" class="translate" rows="3" style="width:100%;"></textarea>
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
                                <input type="hidden" name="quemsomos_downloads[<?php echo $i; ?>]" class="downloads" value="<?php echo $row; ?>"/>
                                <input type="text" name="quemsomos_downloads_texto" class="downloads_texto" value="<?php echo wp_get_attachment_url($row); ?>" readonly="readonly"/>
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
                            <input type="hidden" name="quemsomos_downloads[<?php echo $i; ?>]" class="downloads" value=""/>
                            <input type="text" name="quemsomos_downloads_texto" class="downloads_texto" value="" readonly="readonly"/>
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

function metabox_pagina() {
    global $post;    
    if ($post->post_name == 'quem-somos') {
        add_meta_box('page_quemsomos', 'Página Quem Somos', 'page_quemsomos', array('page'), 'normal', 'high');
    }
}

add_action('add_meta_boxes', 'metabox_pagina');

function save_pagina() {
    global $typenow;
    global $post;
    
    if ($typenow == 'page') {
        if ($post->post_name == 'quem-somos') {
            update_post_meta($post->ID, 'quemsomos_historico_texto', stripslashes($_POST['quemsomos_historico_texto']));
            update_post_meta($post->ID, 'quemsomos_historico', $_POST['quemsomos_historico']);
            update_post_meta($post->ID, 'quemsomos_downloads', $_POST['quemsomos_downloads']);
        }
    }
}

add_action('save_post', 'save_pagina', 100);
