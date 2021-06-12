<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class FileDifferenceController extends Controller
{
    /**
     * method for dasboard blade page
     * @return view
     */
    public function dashboardPage()
    {
    	$fileSystemPath = public_path('task-websites' . DIRECTORY_SEPARATOR);
		$pathA = $fileSystemPath . 'v1';
		$pathB =  $fileSystemPath . 'v2';
		$missingFilesV1vsV2 = $this->getDirectoryContents($pathA, $pathB)['missing_files'];
		$missingFilesV2vsV1 = $this->getDirectoryContents($pathB, $pathA)['missing_files'];
		$missingFilesV1vsV2Count = count($missingFilesV1vsV2);
		$missingFilesV2vsV1Count = count($missingFilesV2vsV1);

		$dissimilarFileContents = $this->getFileContents($pathA, $pathB)['dissimilar_content_files'];

        return view('welcome',  compact('missingFilesV1vsV2', 'missingFilesV1vsV2Count', 'missingFilesV2vsV1', 'missingFilesV2vsV1Count', 'dissimilarFileContents'));
    }

	/**
	 * method to get directory contents
	 * @param string $directory (first directory)
	 * @param stirng $extraDirectory (additional directory to compare)
	 * @param array $allFilesAndFolders (array to store all files and directories)
	 * @param array $missingFiles (array to store all missing files after comparing first directory files with extra directory files)
	 */
	public function getDirectoryContents(string $directory, string $extraDirectory, array &$allFilesAndFolders = [], array &$missingFiles = []) {
	    $files = scandir($directory);

	    foreach ($files as $file) {
	        $path = realpath($directory . DIRECTORY_SEPARATOR . $file);
	        $extraPath = $extraDirectory . DIRECTORY_SEPARATOR . $file;
	        if (!is_dir($path)) {
	            $allFilesAndFolders[] = $path;
	        } else if ($file != "." && $file!= "..") {
	            $this->getDirectoryContents($path, $extraPath, $allFilesAndFolders, $missingFiles);
	            $allFilesAndFolders[] = $path;
	        }

	        if ((realpath($extraPath) === false) && ($file != "." && $file != "..")) {
	        	$missingFiles[] = $extraDirectory . DIRECTORY_SEPARATOR . $file;
	        }
	    }

	    return ['missing_files' => $missingFiles]; 
	}

	/**
	 * method to get dissimilar file contents
	 * @param string $directory (first directory)
	 * @param stirng $extraDirectory (additional directory to compare)
	 * @param array $allFilesAndFolders (array to store all files and directories)
	 * @param array $dissimilarContentFiles (array to store all dissimilar content files after comparing first directory files with extra directory files)
	 */
	public function getFileContents(string $directory, string $extraDirectory, array &$allFilesAndFolders = [], array &$dissimilarContentFiles = []) {
	    $files = scandir($directory);

	    foreach ($files as $file) {
	        $path = realpath($directory . DIRECTORY_SEPARATOR . $file);
	        $extraPath = $extraDirectory . DIRECTORY_SEPARATOR . $file;
	        if (!is_dir($path)) {
	            $allFilesAndFolders[] = $path;
	            if (realpath($extraPath)) {
	            	$lines1 = file( $path, FILE_IGNORE_NEW_LINES );
					$lines2 = file( $extraPath, FILE_IGNORE_NEW_LINES );

					$content = array_diff( $lines1, $lines2 );
					if (!empty($content)) {
						$dissimilarContentFiles[] = ['path' =>  $path, 'content' => $content];
					}
	            }
	        } else if ($file != "." && $file != "..") {
	            $this->getFileContents($path, $extraPath, $allFilesAndFolders, $dissimilarContentFiles);
	            $allFilesAndFolders[] = $path;
	        }
	    }

	    return ['dissimilar_content_files' => $dissimilarContentFiles]; 
	}

}
