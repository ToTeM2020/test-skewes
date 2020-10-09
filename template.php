<!DOCTYPE html>
<html>
<head>
    <title>skewes.cemr.tk</title>
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="/script.js" type="text/javascript"></script>
</head>
<body>
<form>
    <label>от
        <input type="date" id="start" name="trip-start" min="<?= $data['min_date'] ?>" max="<?= $data['max_date'] ?>"
               value="<?= $data['min_date'] ?>">
    </label>
    <label>до
        <input type="date" id="end" name="trip-end" min="<?= $data['min_date'] ?>" max="<?= $data['max_date'] ?>"
               value="<?= $data['max_date'] ?>">
    </label>
    <input type="submit" id="submit">
</form>
<div id="columnchart"></div>
<div id="result"></div>
</body>
</html>
