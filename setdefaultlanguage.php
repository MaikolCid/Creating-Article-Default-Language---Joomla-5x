<?php
defined('_JEXEC') or die;

class PlgSystemSetdefaultlanguage extends JPlugin
{
    public function onContentPrepareForm($form, $data)
    {
        if (!($form instanceof JForm)) {
            return true;
        }

        // Adjust the form name to match both backend and potential frontend forms
        $name = $form->getName();
        if ($name === 'com_content.article') { // Add other form names if needed
            $form->setFieldAttribute('language', 'default', '*');
        }
        return true;
    }

    public function onContentBeforeSave($context, $article, $isNew)
    {
        if ($isNew && ($context == 'com_content.article' || $context == 'com_content.form')) {
            $article->language = '*'; // Ensures new articles are saved with 'All' languages
        }
    }
}
