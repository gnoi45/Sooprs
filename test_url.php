<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Get Query Parameter</title>
</head>
<body>

<script>
// Function to get query parameter by name
function getQueryParam(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Example usage
const parameterValue = getQueryParam('slug');
console.log('Value of parameterName:', parameterValue);
</script>

</body>
</html>
