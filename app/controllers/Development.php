<?php
/**
 * Main controller class
 *
 * Handles requests to the main home page.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org)
 *
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author Michael J Rubinsky <mrubinsk@horde.org>
 */
class HordeWeb_Development_Controller extends HordeWeb_Controller_Base
{
    /**
     *
     *
     * @param Horde_Controller_Response $response
     */
    protected function _processRequest(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        switch ($this->_matchDict->action) {
        case 'index':
            $view->page_title = 'Development - The Horde Project';
            $template = 'index';
            break;
        case 'git':
        case 'cvs':
            $this->_addSyntaxhighlighter();
            // fall through
        case 'contribute':
        case 'documentation':
        case 'licenses':
        case 'modules':
        case 'cvsmodules':
        case 'versions':
            $view->page_title = ucfirst($this->_matchDict->action) . ' - The Horde Project';
            $template = $this->_matchDict->action;
            if ($this->_matchDict->action == 'modules' ||
                $this->_matchDict->action == 'cvsmodules') {
                Horde::addScriptFile('stripe.js');
            }
            break;

        default:
            $this->_notFound($response);
            return;
        }

        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render($template));
    }

    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(
            array($GLOBALS['fs_base'] . '/app/views/Development'));
    }

    public function git_and_ver($module)
    {
        $horde_apps_stable = HordeWeb_Utils::getStableApps();
        $horde_apps_dev = HordeWeb_Utils::getDevApps();
        return '<td><a href="http://git.horde.org/horde-git/-/browse/' . htmlspecialchars($module) . '/">' . htmlspecialchars($module) . '</a>'
            . '</td><td>' . (isset($horde_apps_stable[$module]) ? htmlspecialchars($horde_apps_stable[$module]['ver']) : (isset($horde_apps_dev[$module]) ? htmlspecialchars($horde_apps_dev[$module]['ver']) : '&nbsp;'))
            . '</td>';
    }

    public function cvs_and_ver($module)
    {
        $horde_apps_stable = HordeWeb_Utils::getH3Apps();
        $horde_apps_dev = HordeWeb_Utils::getDevApps();
        return '<td><a href="http://git.horde.org/horde/-/browse/' . htmlspecialchars($module) . '/">' . htmlspecialchars($module) . '</a>'
            . '</td><td>' . (isset($horde_apps_stable[$module]) ? htmlspecialchars($horde_apps_stable[$module]['ver']) : (isset($horde_apps_dev[$module]) && substr($horde_apps_dev[$module], 0, 2) == 'H3' ? htmlspecialchars($horde_apps_dev[$module]['ver']) : '&nbsp;'))
            . '</td>';
    }
}
