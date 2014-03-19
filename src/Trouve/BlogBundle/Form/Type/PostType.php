<?php

namespace Trouve\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title');
        $builder->add('is_publish');
        $builder->add('body');
        $builder->add('save','submit');
        
    }
    public function getName() {
        return 'post';
    }
}

