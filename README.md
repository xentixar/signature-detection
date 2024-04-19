# Signature Detection Project

This project is designed to detect and extract signatures from images using PHP and the GD library.

## Overview

The project includes a PHP script that reads an input image, detects the signature within the image, and saves the extracted signature as a new image with a transparent background.

## Requirements

- PHP (7.0 or higher)
- GD library for PHP

## Installation

1. Clone the repository or download the project files:

    ```
    git clone https://github.com/xentixar/signature-detection.git
    ```

2. Navigate to the project directory:

    ```
    cd signature-detection
    ```

## Usage

### Extracting the Signature

1. Place the image containing the signature in the project directory and rename it as `signature.jpg`.
2. Run the PHP script to extract the signature:

    ```
    php index.php
    ```

3. The extracted signature will be saved as `signature.png` in the project directory.

## How it Works

The PHP script uses the following steps to detect and extract the signature:

1. Load the input image using `imagecreatefromjpeg()`.
2. Loop through each pixel in the image and identify the pixels that are close to black, which is a common color for signatures.
3. Determine the bounding box of the signature by finding the minimum and maximum X and Y coordinates of the signature pixels.
4. Create a new image of the size of the bounding box and plot the signature pixels on the new image.
5. Make the background of the new image transparent and save the extracted signature as a PNG image using `imagepng()`.

## Customization

- You can adjust the RGB threshold values in the code to detect signatures with different colors or shades.
- The project currently supports JPEG input images. You can modify the code to support other image formats by using `imagecreatefrompng()` or `imagecreatefromgif()`.

## Example

Here's an example of the input and output images:

- **Input Image (`signature.jpg`)**

  ![signature.jpg](signature.jpg)

- **Extracted Signature (`signature.png`)**

  ![signature.png](signature.png)

## Disclaimer

The examples provided are basic and may not work perfectly for all images. For more accurate and robust signature detection and background removal, you might need to use more advanced image processing techniques and algorithms.

---