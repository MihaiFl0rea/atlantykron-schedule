<?php

/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/18/2018
 * Time: 10:44 PM
 */

class CustomTCPDF extends TCPDF {

    public $footer;

    public function Header() {
        // Get the current page break margin
        $bMargin = $this->getBreakMargin();

        // Get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;

        // Disable auto-page-break
        $this->SetAutoPageBreak(false, 0);

        // Define the path to the image that you want to use as watermark.
        $img_file = assets_img_url() . 'atlantykron.png';

        // Render the image
        $this->Image($img_file, 10, 10, 32, 19, '', '', '', false, 300, '', false, false, 0);

        // Restore the auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);

        // Set the starting point for the page content
        $this->setPageMark();
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, $this->footer, 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}