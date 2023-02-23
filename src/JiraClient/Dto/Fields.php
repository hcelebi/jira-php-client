<?php

namespace JiraClient\Dto;

class Fields
{
    /** @var Project */
    private $project;
    /** @var string */
    private $summary;
    /** @var string */
    private $description = '';
    /** @var array */
    private $labels;
    /** @var Assignee */
    private $assignee;
    /** @var Repository[] */
    private $repositories = [];
    /** @var IssueType */
    private $issueType;
    /** @var string */
    private $branchName;
    /** @var Issue[] */
    private $links = [];
    /** @var Version[]  */
    private $fixVersions = [];
    /** @var ?Issue */
    private $parent;
    /** @var ?Resolution */
    private $resolution;
    /** @var string */
    private $rankField;

    private array $sprint = [];
    /**
     *  
     * @var Status|null
     */
    private $status;
    /** @var float|null */
    private $storyPoint;
    /** @var string|null */
    private $resolutiondate;
    /** @var string|null */
    private $statuscategorychangedate;

    /**
     * @return Project
     */
    public function getProject(): Project
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject(Project $project): void
    {
        $this->project = $project;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     */
    public function setLabels(array $labels): void
    {
        $this->labels = $labels;
    }

    public function toJson() : string
    {
        return json_encode($this->toArray());
    }

    /**
     * @return Assignee
     */
    public function getAssignee(): Assignee
    {
        return $this->assignee;
    }

    /**
     * @param Assignee $assignee
     */
    public function setAssignee(Assignee $assignee): void
    {
        $this->assignee = $assignee;
    }

    /**
     * @return Repository[]
     */
    public function getRepositories(): array
    {
        return $this->repositories;
    }

    /**
     * @param Repository[] $repositories
     */
    public function setRepositories(array $repositories): void
    {
        $this->repositories = $repositories;
    }

    public function addRepository(Repository $repository) : void
    {
        $this->repositories[] = $repository;
    }

    /**
     * @return IssueType
     */
    public function getIssueType(): IssueType
    {
        return $this->issueType;
    }

    /**
     * @param IssueType $issueType
     */
    public function setIssueType(IssueType $issueType): void
    {
        $this->issueType = $issueType;
    }

    /**
     * @return string
     */
    public function getBranchName(): string
    {
        return $this->branchName;
    }

    /**
     * @param string $branchName
     */
    public function setBranchName(string $branchName): void
    {
        $this->branchName = $branchName;
    }
    /**
     * @return Issue[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @param Issue[] $links
     */
    public function setLinks(array $links): void
    {
        $this->links = $links;
    }

    public function addLink(Issue $issue): void {
        $this->links[] = $issue;
    }

    /**
     * @return Version[]
     */
    public function getFixVersions(): array
    {
        return $this->fixVersions;
    }

    /**
     * @param Version[] $fixVersions
     */
    public function setFixVersions(array $fixVersions): void
    {
        $this->fixVersions = $fixVersions;
    }

    public function addFixVersion(Version $fixVersion): void {
        $this->fixVersions[] = $fixVersion;
    }

    /**
     * @return Issue|null
     */
    public function getParent(): ?Issue
    {
        return $this->parent;
    }

    /**
     * @param Issue|null $parent
     */
    public function setParent(?Issue $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return Resolution|null
     */
    public function getResolution(): ?Resolution
    {
        return $this->resolution;
    }

    /**
     * @param Resolution|null $resolution
     */
    public function setResolution(?Resolution $resolution): void
    {
        $this->resolution = $resolution;
    }

    

    public function toArray() : array
    {
        $repositoriesStack = [];
        foreach ($this->repositories as $repository) {
            $repositoriesStack[] = $repository->toArray();
        }

        $fixVersionStack = [];
        foreach ($this->fixVersions as $fixVersion) {
            $fixVersionStack[] = $fixVersion->toArray();
        }

        $arr = [];
        if ($this->project != null) {
            $arr['project'] = $this->project->toArray();
        }
        if ($this->assignee != null) {
            $arr['assignee'] = $this->assignee->toArray();
        }
        if ($this->issueType != null) {
            $arr['issuetype'] = $this->issueType->toArray();
        }
        if ($this->summary != null) {
            $arr['summary'] = $this->summary;
        }
        if ($this->description != null) {
            $arr['description'] = $this->description;
        }
        if ($this->labels != null) {
            $arr['labels'] = $this->labels;
        }
        if ($this->branchName != null) {
            $arr['customfield_11100'] = $this->branchName;
        }
        if ($repositoriesStack != null && count($repositoriesStack) > 0) {
            $arr['customfield_13000'] = $repositoriesStack;
        }
        if ($fixVersionStack != null && count($fixVersionStack) > 0) {
            $arr['fixVersions'] = $fixVersionStack;
        }
        if ($this->parent != null) {
            $arr['parent'] = $this->parent;
        }
        if ($this->resolution != null) {
            $arr['resolution'] = $this->resolution->toArray();
        }
        if ($this->status != null) {
            $arr['status'] = $this->status->toArray();
        }
        if ($this->rankField != null) {
            $arr['rankField'] = $this->rankField;
        }
        if ($this->sprint != null) {
            $sprints = [];
            foreach ($this->sprint as $item) {
                $sprints[] = $item->toArray();
            }
            $arr['sprint'] = $sprints;
        }
        if ($this->storyPoint != null) {
            $arr['storyPoint'] = $this->storyPoint;
        }
        if ($this->resolutiondate != null) {
            $arr['resolutiondate'] = $this->resolutiondate;
        }
        if ($this->statuscategorychangedate != null) {
            $arr['statuscategorychangedate'] = $this->statuscategorychangedate;
        }
        return $arr;
    }

	/**
	 * @return Status|null
	 */
	public function getStatus(): ?Status {
		return $this->status;
	}
	
	/**
	 * @param Status|null $status
	 */
	public function setStatus(?Status $status): void {
		$this->status = $status;
	}

    /**
     * @return string
     */
    public function getRankField(): string
    {
        return $this->rankField;
    }

    /**
     * @param string $rankField
     */
    public function setRankField(string $rankField): void
    {
        $this->rankField = $rankField;
    }

    /**
     * @return Sprint[]
     */
    public function getSprint(): array
    {
        return $this->sprint;
    }

    /**
     * @param Sprint[] $sprint
     */
    public function setSprint(array $sprint): void
    {
        $this->sprint = $sprint;
    }

    /**
     * @return float|null
     */
    public function getStoryPoint(): ?float
    {
        return $this->storyPoint;
    }

    /**
     * @param float|null $storyPoint
     */
    public function setStoryPoint(?float $storyPoint): void
    {
        $this->storyPoint = $storyPoint;
    }

    /**
     * @return string|null
     */
    public function getResolutiondate(): ?string
    {
        return $this->resolutiondate;
    }

    /**
     * @param string|null $resolutiondate
     */
    public function setResolutiondate(?string $resolutiondate): void
    {
        $this->resolutiondate = $resolutiondate;
    }

    /**
     * @return string|null
     */
    public function getStatuscategorychangedate(): ?string
    {
        return $this->statuscategorychangedate;
    }

    /**
     * @param string|null $statuscategorychangedate
     */
    public function setStatuscategorychangedate(?string $statuscategorychangedate): void
    {
        $this->statuscategorychangedate = $statuscategorychangedate;
    }
}