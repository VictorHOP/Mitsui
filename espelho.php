<?php function page_home($post)
{
    $banner = get_post_meta($post->ID, 'banner', true);
    
?>
    <script>
        jQuery(function() {
            var file_frame;
            var text;
            var id;

            jQuery('.clear_button').on('click', function() {
                jQuery(this).siblings('.banner').val('');
                jQuery(this).siblings('.banner_texto').val('');
            });

            jQuery('.upload_button').on('click', function() {
                id = jQuery(this).parent().find('.banner');
                text = jQuery(this).parent().find('.banner_texto');

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
            <th>Banner Home</th>
            <td>
                <a class="repeatable-add button" href="#">Adicionar novo banner</a>
                <ul class="custom_repeatable">
                    <?php
                    $i = 0;
                    if ($banner) {
                        foreach ($banner as $row) {
                    ?>
                            <li>
                                <span class="sort hndle">|||</span>
                                <a class="repeatable-remove button" href="#">Excluir</a><br>
                                <label for="">Imagem Banner</label><br>
                                <input type="hidden" name="banner[<?php echo $i; ?>][0]" class="banner" value="<?php echo $row[0]; ?>" />
                                <input type="text" name="banner_texto" class="banner_texto" value="<?php echo wp_get_attachment_url($row[0]); ?>" readonly="readonly" />
                                <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                                <input type="button" class="clear_button button" value="Remove Arquivo" /> <br><br>


                                <label for="">Insira a parte do titulo Sem negrito: </label>
                                <input type="text" name="banner[<?php echo $i; ?>][1]" placeholder="Titulo sem Negrito" value="<?php echo $row[1]; ?>" /><br>
                                <label for="">Insira a parte do titulo Com negrito: </label>
                                <input type="text" name="banner[<?php echo $i; ?>][2]" placeholder="Titulo com Negrito" value="<?php echo $row[2]; ?>"/><br>
                                <label for="">Insira o conteudo do subtitulo: </label>
                                <input type="text" name="banner[<?php echo $i; ?>][3]" placeholder="subtitulo" value="<?php echo $row[3]; ?>"/><br>
                                <label for="">Insira o conteudo do botao: </label>
                                <input type="text" name="banner[<?php echo $i; ?>][4]" placeholder="texto do botao" value="<?php echo $row[4]; ?>"/><br>

                                <hr>
                            </li>


                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <li>
                            <span class="sort hndle">|||</span>

                            <label for="">Imagem Banner</label><br>
                            <input type="hidden" name="banner[<?php echo $i; ?>][0]" class="banner" value="" />
                            <input type="text" name="banner_texto" class="banner_texto" value="" readonly="readonly" />
                            <input type="button" class="upload_button button" value="Adicionar Arquivo" />
                            <input type="button" class="clear_button button" value="Remove Arquivo" />
                            <a class="repeatable-remove button" href="#">Excluir</a><br>
                            <br><br>

                            <label for="">Insira a parte do titulo Sem negrito: </label>
                                <input type="text" name="banner[<?php echo $i; ?>][1]" placeholder="Titulo sem Negrito" /><br>

                                <label for="">Insira a parte do titulo Com negrito: </label>
                                <input type="text" name="banner[<?php echo $i; ?>][2]" placeholder="Titulo com Negrito" /><br>
                                <label for="">Insira o conteudo do subtitulo: </label>
                                <input type="text" name="banner[<?php echo $i; ?>][3]" placeholder="subtitulo" /><br>
                                <label for="">Insira o conteudo do botao: </label>
                                <input type="text" name="banner[<?php echo $i; ?>][4]" placeholder="texto do botao" /><br>
                            <hr>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a class="repeatable-add button" href="#">Adicionar novo banner</a>
            </td>
        </tr>
    </table>
<?php
}