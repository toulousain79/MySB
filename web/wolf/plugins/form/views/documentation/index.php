<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

?>
<h1><?php echo __('Documentation'); ?></h1>

<h2><?php echo __('CSS'); ?></h2>

<p><?php echo __("The Form plugin does not include CSS rules to style your forms. You should include your own rules in your layout's CSS file."); ?></p>

<p><?php echo __("The Form plugin uses a definition list (:dl) within the form. For each field, a :dt is used to wrap the label, and a :dd to wrap the actual field itself.", array(':dl' => '<code>&lt;dl&gt;</code>', ':dt' => '<code>&lt;dt&gt;</code>', ':dd' => '<code>&lt;dd&gt;</code>')); ?></p>

<p><?php echo __("So, for example:"); ?></p>

<pre><code>
&lt;form&gt;
    &lt;dl&gt;
        &lt;dt&gt;&lt;label for="form_field_1"&gt;Field 1&lt;/label&gt;&lt;dt&gt;
        &lt;dd&gt;&lt;input type="text" name="form[field_1]" id="form_field_1" /&gt;&lt;/dd&gt;

        &lt;dt&gt;&lt;label for="form_field_2"&gt;Field 2&lt;/label&gt;&lt;dt&gt;
        &lt;dd&gt;&lt;input type="text" name="form[field_2]" id="form_field_2" /&gt;&lt;/dd&gt;
    &lt;/dl&gt;
&lt;/form&gt;
</code></pre>

<p><?php echo __('This way you can style your form however you want.'); ?></p>

<h3><?php echo __('Spam protection'); ?></h3>

<p><?php echo __("The Form plugin uses a honeypot technique to counter automated spam bots. Basically, a dummy field is added to the form. Form submissions where the dummy field is filled in are categorized as spam and won't be sent to the reciever. Your CSS file should ensure that human visitors won't see the dummy field. For this reason, it is essential that you add the following to your CSS:"); ?></p>

<pre><code>
form .mellis {
    display: none;
}
</code></pre>

<h3><?php echo __('Example CSS'); ?></h3>

<p><?php echo __("If you don't want to create your own CSS rules, you can also use the following example:"); ?></p>

<pre><code>
form dt, form dd {
    display: block;
    padding: 0 0 7px;
}

form dt {
    clear: left;
    float: left;
    overflow: hidden;
    width: 160px;
}

form dd {
    float: left;
    margin-left: 5px;
}

label.required,
label:required {
    font-weight: bold;
}

label.required:after,
label:required:after {
    content: ' *';
}

label.invalid,
label:invalid {
    color: #f00;
}

button {
    display: block;
    clear: both;
}

form .mellis {
    display: none;
}
</code></pre>

<h2><?php echo __('Contributing'); ?></h2>

<p><?php echo __('Do you want to contribute to the development of the Form plugin?'); ?></p>

<p><?php echo __('You can report bugs and submit patches through the :github_link.', array(
    ':github_link' => '<a href="https://github.com/wolf-pack/form" target="_blank">' . __('GitHub repository') . '</a>'
)); ?></p>

<p><?php echo __('You can translate the plugin into your language using :transifex_link.', array(
    ':transifex_link' => '<a href="https://www.transifex.com/projects/p/wolfpack-form/" target="_blank">Transifex.com</a>'
)); ?></p>
