<?php
add_action('widgets_init', 'calculadoras_widget_loader');

function calculadoras_widget_loader()
{
    register_widget('Calculadoras_widget');
}

class Calculadoras_widget extends WP_Widget
{

    function Calculadoras_widget()
    {
        $widget_ops = array('classname' => 'calculadoras', 'description' => 'Links para calculadoras.');

        $control_ops = array('id_base' => 'calculadoras-widget');

        $this->WP_Widget('calculadoras-widget', 'Calculadoras', $widget_ops, $control_ops);
    }

    public function widget($args, $instance)
    {
        extract($args);

        ?>
        <a class="flip-link flip-small" href="#">
                    <span class="box-shadow">
                        <span class="fliping">
                            <img src="<?php echo img_folder('calculadora.png') ?>" alt=""/>
                        </span>
                    </span>
            <span class="title">Calculadora de ovulação</span>
        </a>
        <a class="flip-link flip-small" href="#">
                    <span class="box-shadow">
                        <span class="fliping">
                            <img src="<?php echo img_folder('gravidez.png') ?>" alt=""/>
                        </span>
                    </span>
            <span class="title">Teste de chance de gravidez </span>
        </a>
    <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }

    public function form($instance)
    {
        $defaults = array(
            'title'        => 'Calculadoras'
        );

        $instance = wp_parse_args((array)$instance, $defaults); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Título:</label>
            <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>"/>
        </p>

    <?php
    }
}