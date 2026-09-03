<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\StudentService;
use PHPUnit\Framework\TestCase;

class StudentServiceTest extends TestCase
{
    private StudentService $studentService;

    protected function setUp(): void
    {
        $this->studentService = new StudentService();
    }

    public function testAddStudent(): void
    {
        $student = $this->studentService->addStudent(
            'Rahul',
            'rahul@example.com',
        );

        $this->assertSame(1, $student['id']);
        $this->assertSame('Rahul', $student['name']);
        $this->assertSame('rahul@example.com', $student['email']);
    }

    public function testGetStudents(): void
    {
        $this->studentService->addStudent(
            'Rahul',
            'rahul@example.com',
        );

        $this->studentService->addStudent(
            'Priya',
            'priya@example.com',
        );

        $students = $this->studentService->getStudents();

        $this->assertCount(2, $students);
    }

    public function testGetStudentById(): void
    {
        $this->studentService->addStudent(
            'Rahul',
            'rahul@example.com',
        );

        $student = $this->studentService->getStudentById(1);

        $this->assertNotNull($student);
        $this->assertSame('Rahul', $student['name']);
    }

    public function testGetStudentByIdReturnsNullForUnknownStudent(): void
    {
        $student = $this->studentService->getStudentById(999);

        $this->assertNull($student);
    }
}
