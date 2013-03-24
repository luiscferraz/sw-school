<?php
    $this->Pdf->core->addPage('', 'USLETTER');
    $this->Pdf->core->setFont('helvetica', '', 12);
    $this->Pdf->core->cell(30, 0, 'SWScholl');
    $this->Pdf->core->Output('report.pdf', 'D');
?>