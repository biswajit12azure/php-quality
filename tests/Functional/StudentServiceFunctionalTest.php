<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\StudentService;
use PHPUnit\Framework\TestCase;

class StudentServiceFunctionalTest extends TestCase
{
    private StudentService $studentService;

    protected function setUp(): void
    {
        $this->studentService = new StudentService();
    }

    public function testCompleteStudentRegistrationFlow(): void
    {
        // Step 1: Add a student
        $student = $this->studentService->addStudent(
            'Rahul',
            'rahul@example.com',
        );

        // Step 2: Verify student was created
        $this->assertSame(1, $student['id']);
        $this->assertSame('Rahul', $student['name']);

        // Step 3: Retrieve all students
        $students = $this->studentService->getStudents();

        $this->assertCount(1, $students);

        // Step 4: Retrieve student by ID
        $retrievedStudent = $this->studentService->getStudentById(1);

        $this->assertNotNull($retrievedStudent);
        $this->assertSame(
            'rahul@example.com',
            $retrievedStudent['email']
        );
    }

    public function testMultipleStudentsCanBeRegistered(): void
    {
        $this->studentService->addStudent(
            'Rahul',
            'rahul@example.com',
        );

        $this->studentService->addStudent(
            'Priya',
            'priya@example.com',
        );

        $this->studentService->addStudent(
            'Amit',
            'amit@example.com',
        );

        $students = $this->studentService->getStudents();

        $this->assertCount(3, $students);

        $this->assertSame('Rahul', $students[0]['name']);
        $this->assertSame('Priya', $students[1]['name']);
        $this->assertSame('Amit', $students[2]['name']);
    }

    public function testUnknownStudentReturnsNull(): void
    {
        $result = $this->studentService->getStudentById(100);

        $this->assertNull($result);
    }
}
