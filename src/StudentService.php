<?php

declare(strict_types=1);

namespace App;

class StudentService
{
    /**
     * @var array<int, array{id: int, name: string, email: string}>
     */
    private array $students = [];

    /**
     * @return array{id: int, name: string, email: string}
     */
    public function addStudent(string $name, string $email): array
    {
        $student = [
            'id' => count($this->students) + 1,
            'name' => $name,
            'email' => $email,
        ];

        $this->students[] = $student;

        return $student;
    }

    /**
     * @return array<int, array{id: int, name: string, email: string}>
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * @return array{id: int, name: string, email: string}|null
     */
    public function getStudentById(int $id): ?array
    {
        foreach ($this->students as $student) {
            if ($student['id'] === $id) {
                return $student;
            }
        }

        return null;
    }
}
