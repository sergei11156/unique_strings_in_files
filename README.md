# Unique strings in files

Script take two input files, both files consist of lexicographically sorted in the same order ASCII strings, and produce two output files - first output file should contain only strings which were found in first input file, but not in the second one; second output file - strings found in the second input file, but not in the first one.

## Usage

```bash
php cli.php path/to/file1.txt path/to/file2.txt
```

## Requirements
`php >= 7.1`