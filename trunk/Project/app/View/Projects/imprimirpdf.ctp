<?php
	$html = '<p>erucuaucas</p></br> huasdhuashud';
    $this->Pdf->core->addPage('', 'USLETTER');
    $this->Pdf->core->setFont('helvetica', '', 12);
    $this->Pdf->core->writeHTML($html);
    $this->Pdf->core->Output('report.pdf', 'D');
?>