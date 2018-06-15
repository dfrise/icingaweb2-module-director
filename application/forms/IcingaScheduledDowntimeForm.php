<?php

namespace Icinga\Module\Director\Forms;

use Icinga\Module\Director\Web\Form\DirectorObjectForm;

class IcingaScheduledDowntimeForm extends DirectorObjectForm
{
    /**
     * @throws \Zend_Form_Exception
     */
    public function setup()
    {
        if ($this->isTemplate()) {
            $this->addElement('text', 'object_name', [
                'label'    => $this->translate('Template name'),
                'required' => true,
            ]);
        } else {
            $this->addElement('text', 'object_name', [
                'label'    => $this->translate('Downtime name'),
                'required' => true,
            ]);
        }

        $this->addElement('text', 'display_name', array(
            'label' => $this->translate('Display Name'),
            'description' => $this->translate('the display name')
        ));

        $this->addImportsElement();

        $this->addDisabledElement();
        $this->addElement('text', 'author', [
            'label'    => $this->translate('Author'),
            'required' => ! $this->isTemplate()
        ]);
        $this->addElement('textarea', 'comment', [
            'label'    => $this->translate('Comment'),
            'required' => ! $this->isTemplate(),
            'rows'     => 4,
        ]);
        $this->addBoolean('fixed', [
            'label'    => $this->translate('Fixed'),
            'required' => ! $this->isTemplate(),
        ]);
        $this->addElement('text', 'duration', [
            'label'    => $this->translate('Duration'),
            'required' => ! $this->isTemplate(),
        ]);

        $this->setButtons();
    }
}