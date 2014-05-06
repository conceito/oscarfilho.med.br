<?php
add_action('widgets_init', 'contatos_widget_loader');

function contatos_widget_loader()
{
    register_widget('Contatos_widget');
}

class Contatos_widget extends WP_Widget
{

    function Contatos_widget()
    {
        $widget_ops = array('classname' => 'contatos', 'description' => 'Contatos rápidos.');

        $control_ops = array('id_base' => 'contatos-widget');

        $this->WP_Widget('contatos-widget', 'Contatos', $widget_ops, $control_ops);
    }

    public function widget($args, $instance)
    {
        extract($args);

        $place1_tel = $instance['place1_tel'];
        $place2_tel = $instance['place2_tel'];
        $place3_tel = $instance['place3_tel'];
        $place1_address = $instance['place1_address'];
        $place2_address = $instance['place2_address'];
        $place3_address = $instance['place3_address'];

        echo $before_widget;
        ?>

        <?php if (strlen($place1_tel) > 0): ?>
        <p class="ctt-place">Bela Vista</p>
        <p class="ctt-data"><?php echo $place1_tel ?> <br/> <?php echo $place1_address ?></p>
        <div class="division"></div>
    <?php endif; ?>

        <?php if (strlen($place2_tel) > 0): ?>
        <p class="ctt-place">Hospital Israelita Albert Einstein</p>
        <p class="ctt-data"><?php echo $place2_tel ?> <br/> <?php echo $place2_address ?></p>
        <div class="division"></div>
    <?php endif; ?>
        <?php if (strlen($place3_tel) > 0): ?>
        <p class="ctt-place">Tatuapé (Projeto BETA)</p>
        <p class="ctt-data"><?php echo $place3_tel ?> <br/> <?php echo $place3_address ?></p>
    <?php endif; ?>
        <?php
        echo $after_widget;
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['place1_tel']     = $new_instance['place1_tel'];
        $instance['place2_tel']     = $new_instance['place2_tel'];
        $instance['place3_tel']     = $new_instance['place3_tel'];
        $instance['place1_address'] = $new_instance['place1_address'];
        $instance['place2_address'] = $new_instance['place2_address'];
        $instance['place3_address'] = $new_instance['place3_address'];

        return $instance;
    }

    public function form($instance)
    {
        $defaults = array(
            'title'          => 'Contatos',
            'place1_tel'     => '',
            'place2_tel'     => '',
            'place3_tel'     => '',
            'place1_address' => '',
            'place2_address' => '',
            'place3_address' => '',
        );

        $instance = wp_parse_args((array)$instance, $defaults); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Título:</label>
            <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>"/>
        </p>

        <p><b>Bela Vista</b></p>

        <p>
            <label for="<?php echo $this->get_field_id('place1_tel'); ?>">Telefone:</label>
            <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('place1_tel'); ?>"
                   name="<?php echo $this->get_field_name('place1_tel'); ?>"
                   value="<?php echo $instance['place1_tel']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('place1_address'); ?>">Endereço:</label>
            <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('place1_address'); ?>"
                   name="<?php echo $this->get_field_name('place1_address'); ?>"
                   value="<?php echo $instance['place1_address']; ?>"/>
        <hr/>
        </p>

        <p><b>Hospital Albert Einstein</b></p>

        <p>
            <label for="<?php echo $this->get_field_id('place2_tel'); ?>">Telefone:</label>
            <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('place2_tel'); ?>"
                   name="<?php echo $this->get_field_name('place2_tel'); ?>"
                   value="<?php echo $instance['place2_tel']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('place2_address'); ?>">Endereço:</label>
            <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('place2_address'); ?>"
                   name="<?php echo $this->get_field_name('place2_address'); ?>"
                   value="<?php echo $instance['place2_address']; ?>"/>
        <hr/>
        </p>

        <p><b>Tatuapé (Projeto BETA)</b></p>

        <p>
            <label for="<?php echo $this->get_field_id('place3_tel'); ?>">Telefone:</label>
            <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('place3_tel'); ?>"
                   name="<?php echo $this->get_field_name('place3_tel'); ?>"
                   value="<?php echo $instance['place3_tel']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('place3_address'); ?>">Endereço:</label>
            <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('place3_address'); ?>"
                   name="<?php echo $this->get_field_name('place3_address'); ?>"
                   value="<?php echo $instance['place3_address']; ?>"/>
        <hr/>
        </p>

    <?php
    }
}