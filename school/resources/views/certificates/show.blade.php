<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
</head>
<body onload="window.print()">

<h2 align="center">{{ strtoupper($certificate->certificate_type) }} CERTIFICATE</h2>

<p>
This is to certify that <b>{{ $certificate->student_name }}</b>,
son/daughter of <b>{{ $certificate->father_name }}</b>,
Class <b>{{ $certificate->class }}</b>.
</p>

<p>{{ $certificate->remarks }}</p>

<br><br>
Principal <br>
(Signature & Seal)

</body>
</html>
